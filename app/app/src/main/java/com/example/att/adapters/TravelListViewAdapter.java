package com.example.att.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.att.R;
import com.example.att.api.response.RsRequest;
import com.example.att.api.response.RsTravel;

import java.util.ArrayList;
import java.util.List;


public class TravelListViewAdapter extends ArrayAdapter<RsRequest> {

        List<RsRequest> tabla = new ArrayList<>();

    public TravelListViewAdapter(Context context, List<RsRequest> datos){
        super(context, R.layout.detallada_template,datos);
        tabla = datos;
    }
        public View getView(int position, View v, ViewGroup vg){
        LayoutInflater inflater = LayoutInflater.from(getContext());
        View item = inflater.inflate(R.layout.detallada_template, null);

        TextView producto = (TextView)item.findViewById(R.id.txtnombreReceta);
        producto.setText("Destino: "+tabla.get(position).getDestino());
        TextView ingrediente = (TextView)item.findViewById(R.id.txtIng1);
        ingrediente.setText("Hora de llegada: "+tabla.get(position).getHora_llegada());
        TextView preparacion = (TextView)item.findViewById(R.id.txtprepa);
        preparacion.setText("Cantidad de personas: "+tabla.get(position).getCant_personas());
        TextView ing = (TextView)item.findViewById(R.id.txtIng);
        ing.setText("Hora de Salida: "+tabla.get(position).getHora_salida());
        TextView ing2 = (TextView)item.findViewById(R.id.txtIng2);
        ing2.setText("Fecha de Salida: "+tabla.get(position).getFecha());
        TextView ing3 = (TextView)item.findViewById(R.id.txtIng2);
        ing3.setText("Numero de Solicitud: "+tabla.get(position).getId_solicitud());
        return item;
    }
}
