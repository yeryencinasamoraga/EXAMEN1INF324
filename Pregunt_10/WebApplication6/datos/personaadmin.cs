using System;
using System.Collections.Generic;
using System.Linq;
using System.Data.SqlClient;
using System.Web;
using WebApplication6.modelo;

namespace WebApplication6.datos
{
    public class personaadmin:conexion
    {
        public void guardar(personamodelo modelo)
        {

            conectar();
            try
            {
                SqlCommand comando = new SqlCommand("guardar", cnn);
                comando.CommandType = System.Data.CommandType.StoredProcedure;

                comando.Parameters.Add(new SqlParameter("@ci", modelo.ci));
                comando.Parameters.Add(new SqlParameter("@nombre_completo", modelo.nombre_completo));
                comando.Parameters.Add(new SqlParameter("@fecha_nac", modelo.fecha_nac));
                comando.Parameters.Add(new SqlParameter("@departamento", modelo.departamento));
                comando.ExecuteNonQuery();
                comando.Dispose();


            }
            catch (Exception e)
            {

                Console.WriteLine(e.StackTrace);
            }
            finally
            {
                desconectar();
            }
        }

        public List<personamodelo> Consultar()
        {

            List<personamodelo> lista = new List<personamodelo>();
            conectar();
            try
            {
                SqlCommand comando = new SqlCommand("consultar", cnn);
                comando.CommandType = System.Data.CommandType.StoredProcedure;
                SqlDataReader lector = comando.ExecuteReader();
                while (lector.Read())
                {

                    personamodelo modelo = new personamodelo()
                    {
                        ci = int.Parse(lector[0] + ""),
                        nombre_completo = lector[1] + "",
                        fecha_nac = lector[2] + "",
                        departamento = lector[3] + "",

                    };
                    lista.Add(modelo);
                }

            }
            catch (Exception e)
            {

                Console.WriteLine(e.StackTrace);
            }
            finally
            {
                desconectar();
            }
            return lista;

        }

        public String Consultarci(personamodelo modelo)
        {
            string cad="";
            conectar();
            try
            {

                SqlCommand comando = new SqlCommand("buscarci", cnn);
                
                comando.CommandType = System.Data.CommandType.StoredProcedure;
                comando.Parameters.Add(new SqlParameter("@ci", modelo.ci));
                SqlDataReader lector = comando.ExecuteReader();
                
                        int ci = int.Parse(lector[0] + "");
                        string nombre_completo = lector[1] + "";
                        string fecha_nac = lector[2] + "";
                        string departamento = lector[3] + "";


                        cad = ci +";" +nombre_completo+";" + fecha_nac+";"+ departamento;
                

            }
            catch (Exception e)
            {

                Console.WriteLine(e.StackTrace);
            }
            finally
            {
                desconectar();
            }
            return cad;

        }

        public void eliminar(personamodelo modelo)
        {
            conectar();
            try
            {
                SqlCommand comando = new SqlCommand("eliminar", cnn);
                comando.CommandType = System.Data.CommandType.StoredProcedure;

                comando.Parameters.Add(new SqlParameter("@ci", modelo.ci));
                comando.ExecuteNonQuery();
                comando.Dispose();


            }
            catch (Exception e)
            {

                Console.WriteLine(e.StackTrace);
            }
            finally
            {
                desconectar();
            }
        }

        public void editar(personamodelo modelo)
        {
            conectar();
            try
            {
                conectar();
                try
                {
                    SqlCommand comando = new SqlCommand("editar", cnn);
                    comando.CommandType = System.Data.CommandType.StoredProcedure;

                    comando.Parameters.Add(new SqlParameter("@ci", modelo.ci));
                    comando.Parameters.Add(new SqlParameter("@nombre_completo", modelo.nombre_completo));
                    comando.Parameters.Add(new SqlParameter("@fecha_nac", modelo.fecha_nac));
                    comando.Parameters.Add(new SqlParameter("@departamento", modelo.departamento));
                    comando.ExecuteNonQuery();
                    comando.Dispose();


                }
                catch (Exception e)
                {

                    Console.WriteLine(e.StackTrace);
                }
                finally
                {
                    desconectar();
                }


            }
            catch (Exception e)
            {

                Console.WriteLine(e.StackTrace);
            }
            finally
            {
                desconectar();
            }
        }
    }
}