package com.example.att.components.auth;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.att.R;
import com.example.att.api.ApiService;
import com.example.att.api.request.RqUser;
import com.example.att.api.response.RsUser;
import com.example.att.database.DatabaseManager;
import com.example.att.request.RequestDataActivity;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    EditText userEmail, userPassword;
    DatabaseManager database;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        database = new DatabaseManager(getApplicationContext());

        userEmail = (EditText) findViewById(R.id.email);
        userPassword = (EditText) findViewById(R.id.password);


        verifyUserSession();
    }

    private void verifyUserSession() {
        RsUser user = database.getUserSession();
        if (user != null) {
            startActivity(new Intent(getApplicationContext(), AuthMessageActivity.class));
        }
    }

    public void performUserLogin(View v) {
        try {
            String email = userEmail.getText().toString();
            String pass = userPassword.getText().toString();

            Call<RsUser> response = ApiService.getApiService().postlogin(email,pass);
            response.enqueue(new Callback<RsUser>() {
                @Override
                public void onResponse(Call<RsUser> call, Response<RsUser> response) {
                    if (response.isSuccessful()) {
                        RsUser estudiante = response.body();
                        if (estudiante != null) {
                            RqUser user = new RqUser(estudiante.getId_usuario(), estudiante.getEmail(), "", estudiante.getNombre());

                            database.saveUserSession(estudiante);

                            Toast.makeText(getApplicationContext(), "Login Exitoso", Toast.LENGTH_LONG).show();

                            Intent i = new Intent(getApplicationContext(), RequestDataActivity.class);
                            i.putExtra("UserId", estudiante.getId_usuario());
                            i.putExtra("name", estudiante.getNombre());
                            i.putExtra("lastN", estudiante.getApellido());
                            i.putExtra("iden", estudiante.getCedula());
                            i.putExtra("email", estudiante.getEmail());
                            i.putExtra("date",estudiante.getCreated_at());

                            startActivity(i);
                        }
                    } else {
                        Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
                    }
                }

                @Override
                public void onFailure(Call<RsUser> call, Throwable t) {
                    Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
                    int x = 1;
                }
            });
        } catch (Exception e) {
            Toast.makeText(getApplicationContext(), "Error Al Iniciar Sesión", Toast.LENGTH_LONG).show();
            int x = 1;
        }
    }

}