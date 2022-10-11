import psycopg2 as pc
conexion = pc.connect(user="postgres",
                      password="12345678",
                      host="localhost",
                      port="5432",
                      database="mibaseyery")
cursor = conexion.cursor()
sql="select avg(case when xp.departamento='02' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) LP, avg(case when xp.departamento='03' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) CB, avg(case when xp.departamento='04' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) RU, avg(case when xp.departamento='05' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) PT, avg(case when xp.departamento='06' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) TJ, avg(case when xp.departamento='07' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) SC , avg(case when xp.departamento='01' then (xi.nota1+xi.nota2+xi.nota3+xi.nota_final) end) CH from persona xp, inscripcion xi where xp.ci=cast(xi.ci_estudiante as numeric)"
cursor.execute(sql)
registros = cursor.fetchall()
#print(registros)
for registro in registros:
    print("LP","   CH","  OR","  PT","  TJ","  SC") 
    print(round(registro[0],2),registro[1],registro[2],registro[3],registro[4],registro[5])
cursor.close()
conexion.close()