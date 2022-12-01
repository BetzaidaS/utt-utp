package com.example.att.api.response;

public class RsTravel {
    private String id_viaje,id_solicitud,id_conductor,id_vehiculo;
    private int estado_viaje;

    public String getId_viaje() {
        return id_viaje;
    }

    public void setId_viaje(String id_viaje) {
        this.id_viaje = id_viaje;
    }

    public String getId_solicitud() {
        return id_solicitud;
    }

    public void setId_solicitud(String id_solicitud) {
        this.id_solicitud = id_solicitud;
    }

    public String getId_conductor() {
        return id_conductor;
    }

    public void setId_conductor(String id_conductor) {
        this.id_conductor = id_conductor;
    }

    public String getId_vehiculo() {
        return id_vehiculo;
    }

    public void setId_vehiculo(String id_vehiculo) {
        this.id_vehiculo = id_vehiculo;
    }

    public int getEstado_viaje() {
        return estado_viaje;
    }

    public void setEstado_viaje(int estado_viaje) {
        this.estado_viaje = estado_viaje;
    }
}
