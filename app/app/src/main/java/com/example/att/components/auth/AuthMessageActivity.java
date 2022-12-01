package com.example.att.components.auth;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.att.R;
import com.example.att.api.ApiService;
import com.example.att.api.request.RqReport;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class AuthMessageActivity extends AppCompatActivity {
    TextView reporte,kilometraje,situacion;
    RadioButton salvo;
    int idUser;
    Button repor;

    private String report, kilometraj,situacio,salv;


    Intent i;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vehicle_data);


        initializeControllers();

    }
    public void enviar(View v) {
        RqReport rep = new RqReport();
        rep.setMotivo(reporte.getText().toString());
        rep.setDetalles(situacion.getText().toString());
        rep.setFoto("1");
        rep.setId_conductor(1);


        Call<Integer> response = ApiService.getApiService().postReporte(rep);
        response.enqueue(new Callback<Integer>() {

            @Override
            public void onResponse(Call<Integer> call, Response<Integer> response) {
                if (response.isSuccessful()) {
                    Toast.makeText(getApplicationContext(), "Datos Creados Correctamente", Toast.LENGTH_LONG).show();
                }

            }
            @Override
            public void onFailure(Call<Integer> call, Throwable t) {
                Toast.makeText(getApplicationContext(), "Datos Creados Correctamente", Toast.LENGTH_LONG).show();
                int x = 1;
            }
        });


    }


    public void initializeControllers() {

        reporte = (EditText) findViewById(R.id.reporte);
        kilometraje = (EditText) findViewById(R.id.kilometraje);
        situacion = (EditText) findViewById(R.id.situacion);
        salvo = (RadioButton) findViewById(R.id.salvo);
        repor = (Button) findViewById(R.id.enviar);


    }


}