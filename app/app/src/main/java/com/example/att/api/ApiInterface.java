package com.example.att.api;

import com.example.att.api.request.RqReport;
import com.example.att.api.response.RsRequest;
import com.example.att.api.response.RsTravel;
import com.example.att.api.response.RsUser;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;
import retrofit2.http.Query;

public interface ApiInterface {

    @POST("login")
    Call<RsUser> postlogin(@Query("email") String email, @Query("pass") String pass);

    @POST("viajes")
    Call<RsTravel> postViaje(@Query("id_conductor") String id_conductor);

    @POST("solicitud")
    Call<List<RsRequest>> postSolicitud(@Query("id_solicitud") String id_solicitud);

    @POST("reporte")
    Call<Integer> postReporte(@Body RqReport report);
}
