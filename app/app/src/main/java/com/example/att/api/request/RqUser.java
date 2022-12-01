package com.example.att.api.request;

public class RqUser {

    private String email;
    private String pass;
    private String nombre;
    private int usuario_id;

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getUsuario_id() {
        return usuario_id;
    }

    public void setUsuario_id(int usuario_id) {
        this.usuario_id = usuario_id;
    }

    public RqUser(int id, String email, String pass, String nombre) {
        this.usuario_id = id;
        this.email = email;
        this.pass = pass;
        this.nombre = nombre;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }
}
