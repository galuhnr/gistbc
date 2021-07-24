package com.example.tbcapp.mapbox;

import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import com.example.tbcapp.R;
import com.mapbox.mapboxsdk.Mapbox;
import com.mapbox.mapboxsdk.maps.MapView;
import com.mapbox.mapboxsdk.maps.MapboxMap;
import com.mapbox.mapboxsdk.maps.OnMapReadyCallback;
import com.mapbox.mapboxsdk.maps.Style;
import com.mapbox.mapboxsdk.style.expressions.Expression;
import com.mapbox.mapboxsdk.style.layers.FillLayer;
import com.mapbox.mapboxsdk.style.sources.GeoJsonSource;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.lang.ref.WeakReference;
import java.net.HttpURLConnection;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.URL;

import static com.mapbox.mapboxsdk.style.expressions.Expression.get;
import static com.mapbox.mapboxsdk.style.expressions.Expression.match;
import static com.mapbox.mapboxsdk.style.expressions.Expression.rgba;
import static com.mapbox.mapboxsdk.style.expressions.Expression.stop;
import static com.mapbox.mapboxsdk.style.expressions.Expression.toNumber;
import static com.mapbox.mapboxsdk.style.layers.PropertyFactory.fillColor;

public class MapActivity extends AppCompatActivity implements OnMapReadyCallback {

    private static final String DATA_MATCH_API = "kecamatan";
    private static final String DATA_MATCH_MAP = "state_code";
    private static final String DATA_STYLE = "cluster";

    private final String TAG = "MapActivity";
    Toolbar toolbar;

    private MapView mapView;
    private MapboxMap mapboxMap;
    private JSONArray statesArray;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //mapbox
        Mapbox.getInstance(this, getString(R.string.mapbox_access_token));
        setContentView(R.layout.activity_map);
        mapView = findViewById(R.id.mapView);
        mapView.onCreate(savedInstanceState);
        mapView.getMapAsync(this);

        //toolbar di appbar
        toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        toolbar.setNavigationIcon(R.drawable.ic_arrow);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

    }

    //turunan dari implements onMapReady untuk menampilkan peta juga geojson
    @Override
    public void onMapReady(@NonNull final MapboxMap map) {
        this.mapboxMap = map;
        map.setStyle(Style.OUTDOORS);
    }

    private void addDataToMap(@NonNull Expression.Stop[] stops) {
        FillLayer statesJoinLayer = new FillLayer("states-join", "sbydata");
        statesJoinLayer.setSourceLayer("sbydata");
        statesJoinLayer.withProperties(
                fillColor(match(toNumber(get(DATA_MATCH_MAP)),
                        rgba(0, 0, 0, 1), stops))
        );
        // Add layer to map below the "waterway-label" layer
        if (mapboxMap != null) {
            mapboxMap.getStyle(style -> style.addLayerAbove(statesJoinLayer, "waterway-label"));
        }
    }

    private static class LoadJson extends AsyncTask<Void, Void, Expression.Stop[]> {

        private WeakReference<MapActivity> weakReference;
        private final String TAG = "MapActivity";

        String line;
        int item;
        URL url;

        LoadJson(MapActivity activity, int item) {
            this.weakReference = new WeakReference<>(activity);
            this.item = item;
        }

        @Override
        protected Expression.Stop[] doInBackground(Void... voids){
            try {
                MapActivity activity = weakReference.get();
                if (activity != null) {
                    try {
                        if(item==R.id.thn_2016){
                            URL api2016 = new URL("http://10.0.2.2:8000/api/cluster2016");
                            url = api2016;
                        }else if(item==R.id.thn_2017){
                            URL api2017 = new URL("http://10.0.2.2:8000/api/cluster2017");
                            url = api2017;
                        }else if(item==R.id.thn_2018){
                            URL api2018 = new URL("http://10.0.2.2:8000/api/cluster2018");
                            url = api2018;
                        }else if(item==R.id.thn_2019){
                            URL api2019 = new URL("http://10.0.2.2:8000/api/cluster2019");
                            url = api2019;
                        }else{
                            Log.e(TAG,"proses api gagal");
                        }

                        HttpURLConnection hr = (HttpURLConnection) url.openConnection();
                        Log.e(TAG,"success"+hr.getResponseCode());
                        if(hr.getResponseCode() == 200){
                            InputStream is = hr.getInputStream();
                            BufferedReader br = new BufferedReader(new InputStreamReader(is));
                            line = br.readLine();
                        }
                    }catch (Exception e){
                        Log.d(TAG,"gagal"+e);
                    }

                    activity.statesArray = new JSONArray(line);
                    Log.d(TAG,"data"+activity.statesArray);

                    Expression.Stop[] stops = new Expression.Stop[activity.statesArray.length()];
                    for (int x = 0; x < activity.statesArray.length(); x++) {
                        try {
                            // pewarnaan tiap cluster
                            JSONObject singleState = activity.statesArray.getJSONObject(x);
                            if(singleState.getDouble(DATA_STYLE)==1){
                                stops[x] = stop(
                                        Double.parseDouble(singleState.getString(DATA_MATCH_API)),
                                        rgba(0, 255, 0, 1)
                                );
                            }else if(singleState.getDouble(DATA_STYLE)==2){
                                stops[x] = stop(
                                        Double.parseDouble(singleState.getString(DATA_MATCH_API)),
                                        rgba(255, 255, 0, 1)
                                );
                            }else if(singleState.getDouble(DATA_STYLE)==3){
                                stops[x] = stop(
                                        Double.parseDouble(singleState.getString(DATA_MATCH_API)),
                                        rgba(255, 0, 0, 1)
                                );
                            }
                        } catch (JSONException exception) {
                            throw new RuntimeException(exception);
                        }
                    }
                    return stops;
                }
            } catch (Exception exception) {
                Log.d(TAG,"Exception Loading GeoJSON: %s"+exception.toString());
            }
            return null;
        }

        @Override
        protected void onPostExecute(@Nullable Expression.Stop[] stopsArray) {
            super.onPostExecute(stopsArray);
            MapActivity activity = weakReference.get();
            if (activity != null && stopsArray != null) {
                activity.addDataToMap(stopsArray);
            }
        }
    }

    //menu pilihan tahun
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_tahun,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle item selection
        switch (item.getItemId()) {
            case R.id.thn_2016:
                mapboxMap.setStyle(Style.OUTDOORS, new Style.OnStyleLoaded() {
                    @Override
                    public void onStyleLoaded(@NonNull Style style) {
                        try {
                            GeoJsonSource sbyRouteGeoJson = new GeoJsonSource(
                                    "sbydata", new URI("asset://sby.geojson"));
                            style.addSource(sbyRouteGeoJson);
                            new LoadJson(MapActivity.this,R.id.thn_2016).execute();
                        } catch (URISyntaxException exception) {
                            Log.e(TAG,"geojson tidak tampil"+exception);
                        }
                    }
                });
                return true;
            case R.id.thn_2017:
                mapboxMap.setStyle(Style.OUTDOORS, new Style.OnStyleLoaded() {
                    @Override
                    public void onStyleLoaded(@NonNull Style style) {
                        try {
                            GeoJsonSource sbyRouteGeoJson = new GeoJsonSource(
                                    "sbydata", new URI("asset://sby.geojson"));
                            style.addSource(sbyRouteGeoJson);
                            new LoadJson(MapActivity.this,R.id.thn_2017).execute();
                        } catch (URISyntaxException exception) {
                            Log.e(TAG,"geojson tidak tampil"+exception);
                        }
                    }
                });
                return true;
            case R.id.thn_2018:
                mapboxMap.setStyle(Style.OUTDOORS, new Style.OnStyleLoaded() {
                    @Override
                    public void onStyleLoaded(@NonNull Style style) {
                        try {
                            GeoJsonSource sbyRouteGeoJson = new GeoJsonSource(
                                    "sbydata", new URI("asset://sby.geojson"));
                            style.addSource(sbyRouteGeoJson);
                            new LoadJson(MapActivity.this,R.id.thn_2018).execute();
                        } catch (URISyntaxException exception) {
                            Log.e(TAG,"geojson tidak tampil"+exception);
                        }
                    }
                });
                return true;
            case R.id.thn_2019:
                mapboxMap.setStyle(Style.OUTDOORS, new Style.OnStyleLoaded() {
                    @Override
                    public void onStyleLoaded(@NonNull Style style) {
                        try {
                            GeoJsonSource sbyRouteGeoJson = new GeoJsonSource(
                                    "sbydata", new URI("asset://sby.geojson"));
                            style.addSource(sbyRouteGeoJson);
                            new LoadJson(MapActivity.this,R.id.thn_2019).execute();
                        } catch (URISyntaxException exception) {
                            Log.e(TAG,"geojson tidak tampil"+exception);
                        }
                    }
                });
                return true;
            case android.R.id.home:
                finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    protected void onStart() {
        super.onStart();
        mapView.onStart();
    }

    @Override
    protected void onResume() {
        super.onResume();
        mapView.onResume();
    }

    @Override
    protected void onPause() {
        super.onPause();
        mapView.onPause();
    }

    @Override
    protected void onStop() {
        super.onStop();
        mapView.onStop();
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        super.onSaveInstanceState(outState);
        mapView.onSaveInstanceState(outState);
    }

    @Override
    public void onLowMemory() {
        super.onLowMemory();
        mapView.onLowMemory();
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        mapView.onDestroy();
    }
}
