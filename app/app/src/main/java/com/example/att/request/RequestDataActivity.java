package com.example.att.request;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.att.R;
import com.example.att.adapters.TravelListViewAdapter;
import com.example.att.api.ApiService;
import com.example.att.api.response.RsRequest;
import com.example.att.api.response.RsTravel;
import com.example.att.components.auth.AuthMessageActivity;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RequestDataActivity extends AppCompatActivity {
    TextView txtDate,txtName;
    ListView lstdetallada;
    ImageButton reportI;
    private String date,name,lastN;
    private int idUser;
    int Id_conductor,Id_solicitud,Id_vehiculo,estado_viaje;

    Intent i;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_request_data);



        i = getIntent();
        idUser = i.getIntExtra("UserId",0);
        date = i.getStringExtra("date");
        name = i.getStringExtra("name");
        lastN = i.getStringExtra("lastN");

        initializeControllers();
        travel();
    }
    public void generateReport(View v) {
        Intent i = new Intent(getApplicationContext(), AuthMessageActivity.class);
        i.putExtra("UserId", idUser);
        startActivity(i);
    }


    public void travel() {
        try {
            Call<RsTravel> response = ApiService.getApiService().postViaje(Integer.toString(idUser));
            response.enqueue(new Callback<RsTravel>() {
                @Override
                public void onResponse(Call<RsTravel> call, Response<RsTravel> response) {
                    if (response.isSuccessful()) {
                        RsTravel travel = response.body();
                        if (travel != null) {

                            Id_conductor=Integer.parseInt(travel.getId_conductor());
                            Id_solicitud=Integer.parseInt(travel.getId_solicitud());
                            Id_vehiculo=Integer.parseInt(travel.getId_vehiculo());
                            estado_viaje=travel.getEstado_viaje();

                            request(Integer.toString(Id_solicitud));

                        }
                    } else {
                        Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
                    }


                }

                @Override
                public void onFailure(Call<RsTravel> call, Throwable t) {
                    Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
                    int x = 1;
                }
            });
        } catch (Exception e) {
            Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
            int x = 1;
        }
    }

    public List<RsRequest> request(String id_solicitud)
    {
        try {
            Intent i = getIntent();
            Call<List<RsRequest>> response2 = ApiService.getApiService().postSolicitud(id_solicitud);
            response2.enqueue(new Callback<List<RsRequest>>() {
                @Override
                public void onResponse(Call<List<RsRequest>> call, Response<List<RsRequest>> response) {
                    if(response.isSuccessful()){
                        List<RsRequest> table = response.body();
                        TravelListViewAdapter adapter = new TravelListViewAdapter(getApplicationContext(), table);
                        lstdetallada.setAdapter(adapter);}
                }
                @Override
                public void onFailure(Call<List<RsRequest>> call, Throwable t) {

                }
            });
        }
        catch(Exception e){
            Toast.makeText(getApplicationContext(),"Error "+e,Toast.LENGTH_LONG).show();
        }
        return null;
    }

    public void initializeControllers() {

        txtDate = (TextView)findViewById(R.id.date);
        txtName = (TextView)findViewById(R.id.name);
        lstdetallada = (ListView)findViewById(R.id.lstRecetaDetallada);
        reportI=(ImageButton) findViewById(R.id.reporteI);
        txtDate.setText(date);
        txtName.setText("Conductor "+name+" "+lastN);

    }
}
