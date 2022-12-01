package com.example.att.database;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DatabaseHelper extends SQLiteOpenHelper {

    String cvid_sesion = "CREATE TABLE session (id_usuario INTEGER, email TEXT, nombre TEXT)";



    public DatabaseHelper(Context contex, String dbName, SQLiteDatabase.CursorFactory cursor, int dbVersion){
        super(contex,dbName,cursor,dbVersion);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(cvid_sesion);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int lastDb, int newDb) {

    }
}
