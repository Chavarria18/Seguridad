package com.seguridad.seguridad;

import java.util.List;

import org.hibernate.annotations.Any;
import org.hibernate.hql.internal.ast.SqlASTFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;



@Controller
public class controlador {
    @Autowired(required = true)
    private Dao dao;


    @RequestMapping("/")
    public String ver_login(final Model model) {
        return "login.html";
       
    }

    @RequestMapping("/log")
    public String ejecutar_login(
        final Model model,
        @RequestParam(name = "usuario") String usuario,
        @RequestParam(name = "contraseña") String contraseña
    )
    {
        String sql = "select *from SEGURIDAD.USUARIOS where usuario='"+usuario+"'   and contraseña ='" + contraseña +"'";
        
        final List<Usuario> info_usurio = dao.verificar_usuario(sql);
        
        if(info_usurio.size()>0){   
            final List<Producto> productos = dao.listar_productos();

            model.addAttribute("lista_productos", productos);
            return "home.html"; 

        }else{   
            return "redirect:/?error=true";

        }

   
       
    }



    
    @RequestMapping("/?{error}")
    public String login_error(final Model model, @PathVariable("error") String error) {

        return "login.html";
    }

    @RequestMapping(value = "/busqueda", method = RequestMethod.GET)
    public String viewBusqueda(final Model model, @RequestParam(value = "buscar", required = false) String buscar) {
       
        String sql = "select *from seguridad.producto where nombre_p ='" + buscar + "'";
        final List<Any> lista_producto = dao.buscar_producto(sql);
        model.addAttribute("productos", lista_producto);
        

        return "busqueda.html";
    }


   



    
}
