package com.example.parkflow.Model;

public class Vehicle {
//                        "[id] INTEGER PRIMARY KEY AUTOINCREMENT," +
//                                "[plate] VARCHAR(10) NOT NULL," +
//                                "[brand] VARCHAR(255) NOT NULL," +
//                                "[model] VARCHAR(550) NOT NULL," +
//                                "[year] INTEGER," +
//                                "[color] VARCHAR(100)," +
//                                "[id_user] INTEGER," +
//                                "FOREIGN KEY ([id_user]) REFERENCES [user]([id])" +
//                                ")"
    private int id;
    private String plate;
    private String brand;
    private String model;
    private String color;
    private int year;
    private int idUser;

    public Vehicle(String brand, String model, String color, String plate, int year){
        this.brand = brand;
        this.model = model;
        this.color = color;
        this.plate = plate;
        this.year = year;
    }
    public Vehicle(int id, String brand, String model, String color, String plate, int year, int idUser){
        this.brand = brand;
        this.model = model;
        this.color = color;
        this.plate = plate;
        this.year = year;
        this.id = id;
        this.idUser = idUser;
    }
    public int getId() {return id;}
    public int getIdUser() {return idUser;}
    public String getBrand() {return brand;}
    public int getYear() {return year;}
    public String getColor() {return color;}
    public String getModel() {return model;}
    public String getPlate() {return plate;}
    public void setBrand(String brand) {this.brand = brand;}
    public void setColor(String color) {this.color = color;}
    public void setId(int id) {this.id = id;}
    public void setIdUser(int idUser) {this.idUser = idUser;}
    public void setModel(String model) {this.model = model;}
    public void setPlate(String plate) {this.plate = plate;}
    public void setYear(int year) {this.year = year;}

}
