using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using WebApplication6.datos;
using WebApplication6.modelo;

namespace WebApplication6
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        personaadmin admin = new personaadmin();
        private void consultar()
        {
            GridView1.DataSource = admin.Consultar();
            GridView1.DataBind();
        }
        protected void Page_Load(object sender, EventArgs e)
        {
            consultar();
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            personamodelo modelo = new personamodelo()
            {
                ci = int.Parse(txtci.Text),
                nombre_completo = txtnombre.Text,
                fecha_nac = txtfecha.Text,
                departamento = txtdpto.Text

            };
            admin.guardar(modelo);
            consultar();
        }

        protected void Button2_Click(object sender, EventArgs e)
        {
            personamodelo modelo = new personamodelo()
            {
                ci = int.Parse(txtci.Text),
                
            };
            admin.eliminar(modelo);
            consultar();
        }

        protected void Button3_Click(object sender, EventArgs e)
        {
            /*personamodelo modelo = new personamodelo()
            {
                ci = int.Parse(txtci.Text),

            };
            string cadena =admin.Consultarci(modelo);
            string[] p = cadena.Split(';');
            txtci.Text = admin.Consultarci(modelo)+"yeyryr";
            //txtnombre.Text = p[1];
            //txtfecha.Text = p[2];
           // txtfecha.Text=p[3];*/
            personamodelo modelo = new personamodelo()
            {
                ci = int.Parse(txtci.Text),
                nombre_completo = txtnombre.Text,
                fecha_nac = txtfecha.Text,
                departamento = txtdpto.Text

            };
            admin.editar(modelo);
            consultar();



        }
    }
}