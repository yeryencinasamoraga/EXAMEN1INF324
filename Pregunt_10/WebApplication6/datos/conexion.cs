using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace WebApplication6.datos
{
    public class conexion
    {
        
        protected SqlConnection cnn;
        protected void conectar()
        {
            try
            {
                cnn = new SqlConnection("Data Source=(LocalDB)\\v11.0;AttachDbFilename=C:\\Users\\HP\\Documents\\Visual Studio 2012\\Projects\\Pregunt_10\\WebApplication6\\App_Data\\mibaseyery.mdf;Integrated Security=True");
                cnn.Open();
            }
            catch (Exception e)
            {
                Console.WriteLine(e.StackTrace);
            }
        }


        protected void desconectar()
        {
            try
            {
                cnn.Close();
                cnn.Dispose();
            }
            catch (Exception e)
            {
                Console.WriteLine(e.StackTrace);
            }
        }
    }
}