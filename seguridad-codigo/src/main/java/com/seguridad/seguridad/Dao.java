package com.seguridad.seguridad;

import java.util.List;

import org.aspectj.weaver.patterns.AnyAnnotationTypePattern;
import org.hibernate.annotations.Any;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;
import org.springframework.jdbc.core.BeanPropertyRowMapper; 

@Repository
public class Dao {
    

    public Dao(){

       
    }

    @Autowired
    private JdbcTemplate jdbcTemplate;


    public Dao(JdbcTemplate jdbcTemplate) {
        this.jdbcTemplate = jdbcTemplate;
    }


   /* public List<Usuario> verificar_usuario(String usuario, String contraseña) {
        String sql = "select *from SEGURIDAD.USUARIOS where usuario = ? and contraseña = ?";
        Object[] args = { usuario,contraseña };
        List<Usuario> info_usuario = jdbcTemplate.query(sql, args, BeanPropertyRowMapper.newInstance(Usuario.class));
        return info_usuario;    
    }*/

     public List<Usuario> verificar_usuario(String sql) {
       
    
        List<Usuario> info_usuario = jdbcTemplate.query(sql, BeanPropertyRowMapper.newInstance(Usuario.class));
        return info_usuario;    
    }


    public List<Producto> listar_productos() {
        String sql = "select *from SEGURIDAD.PRODUCTO ";
      
        List<Producto> info_productos = jdbcTemplate.query(sql,  BeanPropertyRowMapper.newInstance(Producto.class));
        return info_productos;    
    }

    public List<Any> buscar_producto(String sql) {
       
       
        List<Any> listaBusqueda = jdbcTemplate.query(sql, BeanPropertyRowMapper.newInstance(Any.class));
        return listaBusqueda;

    }





    


}/* algo;drop table seguridad.productos*/
