<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="WebApplication6.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
    </div>
        <asp:Label ID="Label1" runat="server" Text="CI: "></asp:Label>
        <asp:TextBox ID="txtci" runat="server"></asp:TextBox>
        <asp:Button ID="Button3" runat="server" OnClick="Button3_Click" Text="Editar" />
        <asp:Button ID="Button2" runat="server" OnClick="Button2_Click" Text="Eliminar" />
        <p>
            <asp:Label runat="server" Text="Nombre:"></asp:Label>
            <asp:TextBox ID="txtnombre" runat="server"></asp:TextBox>
        </p>
        Fecha Nac:(año/mes/dia)
        <asp:TextBox ID="txtfecha" runat="server"></asp:TextBox>
        <br />
        <br />
        Departamento <asp:TextBox ID="txtdpto" runat="server"></asp:TextBox>
        <p>
            <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text="Agregar" />
        </p>
        <asp:GridView ID="GridView1" runat="server">
        </asp:GridView>
    </form>
</body>
</html>
