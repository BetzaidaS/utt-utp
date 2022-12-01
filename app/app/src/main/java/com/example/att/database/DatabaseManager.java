package com.example.att.database;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import com.example.att.api.response.RsUser;

public class DatabaseManager {

    DatabaseHelper databaseHelper;

    public DatabaseManager(Context context) {
        databaseHelper = new DatabaseHelper(context, "att", null, 1);
    }

    public Boolean saveUserSession(RsUser user) {
        try {
            SQLiteDatabase db = databaseHelper.getWritableDatabase();
            if (db != null) {
                db.delete("session", null, null);
                ContentValues values = new ContentValues();
                values.put("id_usuario", user.getId_usuario());
                values.put("email", user.getEmail());
                values.put("nombre", user.getNombre());


                db.insert("session", null, values);
                db.close();

                return true;
            }
        } catch (Exception ignored) {
        }

        return false;
    }

    public RsUser getUserSession() {
        try {
            SQLiteDatabase db = databaseHelper.getReadableDatabase();
            if (db != null) {
                String[] campos = new String[]{"id_usuario", "email", "nombre"};
                Cursor cursor = db.query("session", campos, null, null, null, null, null);
                if (cursor.moveToFirst()) {

                }
            }
        } catch (Exception c) {
            return null;
        }

        return null;
    }

    public Boolean closeUserSession() {
        try {
            SQLiteDatabase db = databaseHelper.getWritableDatabase();
            if (db != null) {
                // NOMBRE DE LA TABLA , NULL, VALORES DE INSERTAR(REGISTROS CONTENT VALUES)
                db.delete("session", "id_usuario", null);
                return true;
            }
        } catch (Exception ignored) {
        }

        return false;
    }
}
