<?php
$aAlunos = array(
    array(
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Alex Abreu"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Isaac Leder"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Yasmim Aline"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Fillipe"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Gleyson Schlemper"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Guilherme Schroeder"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Eduardo Correa"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Carlos Muller"),
        array("data" =>"2023-01-30", "faltas" =>0,"aluno" =>"Douglas Regis Hammes"),
        array("data"=>"2023-01-31", "faltas"=>4, "aluno" =>"Mateus Schram"),
        array("data"=>"2023-01-31", "faltas"=>4, "aluno" =>"Bruno Sasse")
    )
,array(
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Alex Abreu"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Isaac Leder"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Yasmim Aline"), // Em casa pelo teams
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Fillipe"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Gleyson Schlemper"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Guilherme Schroeder"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Eduardo Correa"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Carlos Muller"),
        array("data"=>"2023-01-31", "faltas"=>4, "aluno" =>"Douglas Regis Hammes"),// nao veio ainda
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Mateus Schram"),
        array("data"=>"2023-01-31", "faltas"=>0, "aluno" =>"Bruno Sasse")
    )
,array(
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Alex Abreu"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Isaac Leder"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Yasmim Aline"), // Em casa pelo teams
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Fillipe"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Eduardo Correa"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Carlos Muller"),
        array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Mateus Schram"),
        array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Bruno Sasse")
    )
,array(
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Alex Abreu"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Isaac Leder"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Yasmim Aline"), // Em casa pelo teams
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Fillipe"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
        array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Eduardo Correa"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Carlos Muller"),
        array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Mateus Schram"),
        array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Bruno Sasse")
    )
);

// verificar a atividade em casa de quem fez
$aListaAtividades = array(
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Alex Abreu", "github" =>"https://github.com/alexAbreu88"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Isaac Leder"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Yasmim Aline"), // Em casa pelo teams
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Fillipe"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
    array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Eduardo Correa"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Carlos Muller"),
    array("data" => "2023-02-01", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Mateus Schram"),
    array("data" => "2023-02-01", "faltas" =>0, "aluno" =>"Bruno Sasse")
);

// verificar a atividade em casa de quem fez
$aListaAtividades = array(
	// GIHUB OK
	array("data" =>"2023-02-08", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/Isaacleder/curso-php-mysql", "2023-02-08", "faltas" =>0, "aluno" =>"Isaac Leder"),
	array("data" =>"2023-02-08", "repositorio" =>"curso-php"       , "github" =>"https://github.com/mimaline/curso-php", "2023-02-08", "faltas" =>0, "aluno" =>"Yasmim Aline"),
	array("data" =>"2023-02-08", "repositorio" =>"curso-mysql-php" , "github" =>"https://github.com/gleisonschlemper/curso-mysql-php", "2023-02-08", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
	array("data" =>"2023-02-08", "repositorio" =>"CursoPHPSenac"   , "github" =>"https://github.com/guilhermeschr/CursoPHPSenac", "2023-02-08", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
	array("data" =>"2023-02-08", "repositorio" =>"cursophpsenac"   , "github" =>"https://github.com/AlexAbreu88/cursophpsenac", "2023-02-08", "faltas" =>0, "aluno" =>"Alex Abreu"),
	array("data" =>"2023-02-08", "repositorio" =>"php-2023-Senac"  , "github" =>"https://github.com/matheusschramm/php-2023-Senac", "2023-02-08", "faltas" =>0, "aluno" =>"Mateus Schram"),
	array("data" =>"2023-02-08", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/FillipeGhs/curso-php-mysql", "2023-02-08", "faltas" =>0, "aluno" =>"Fillipe"),
	array("data" =>"2023-02-08", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/EduuCorrea/curso-php-mysql", "2023-02-08", "faltas" =>0, "aluno" =>"Eduardo Correa"),
	array("data" =>"2023-02-08", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/CarluUu/curso-php-mysql", "2023-02-08", "faltas" =>0, "aluno" =>"Carlos Muller"),	
    array("data" =>"2023-02-08", "repositorio" =>"curso-php-sql"   , "github" =>"https://github.com/BrunoSasse05/curso-php-sql", "2023-02-08", "faltas" =>0, "aluno" =>"Bruno Sasse"),
	
	// NAO VEIO MAIS NA AULA...
	//array("data" =>"2023-02-08", "repositorio" =>"", "github" =>"https://github.com/", "2023-02-08", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
);

$aListaAtividades = array(
	// GIHUB OK
	array("data" =>"2023-02-09", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/Isaacleder/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Isaac Leder"),
	array("data" =>"2023-02-09", "repositorio" =>"curso-php"       , "github" =>"https://github.com/mimaline/curso-php"				 , "2023-02-08", "faltas" =>0, "aluno" =>"Yasmim Aline"),
	array("data" =>"2023-02-09", "repositorio" =>"curso-mysql-php" , "github" =>"https://github.com/gleisonschlemper/curso-mysql-php", "2023-02-08", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
	array("data" =>"2023-02-09", "repositorio" =>"CursoPHPSenac"   , "github" =>"https://github.com/guilhermeschr/CursoPHPSenac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
	array("data" =>"2023-02-09", "repositorio" =>"cursophpsenac"   , "github" =>"https://github.com/AlexAbreu88/cursophpsenac"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Alex Abreu"),
	array("data" =>"2023-02-09", "repositorio" =>"php-2023-Senac"  , "github" =>"https://github.com/matheusschramm/php-2023-Senac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Mateus Schram"),
	array("data" =>"2023-02-09", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/FillipeGhs/curso-php-mysql"	     , "2023-02-08", "faltas" =>0, "aluno" =>"Fillipe"),
	array("data" =>"2023-02-09", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/EduuCorrea/curso-php-mysql"		 , "2023-02-08", "faltas" =>4, "aluno" =>"Eduardo Correa"),
	array("data" =>"2023-02-09", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/CarluUu/curso-php-mysql"		 , "2023-02-08", "faltas" =>4, "aluno" =>"Carlos Muller"),
    array("data" =>"2023-02-09", "repositorio" =>"curso-php-sql"   , "github" =>"https://github.com/BrunoSasse05/curso-php-sql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Bruno Sasse"),

	// NAO VEIO MAIS NA AULA...
	//array("data" =>"2023-02-08", "repositorio" =>"", "github" =>"https://github.com/", "2023-02-08", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
);


$aListaAtividades = array(
    // GIHUB OK
    array("data" =>"2023-02-13", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/Isaacleder/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Isaac Leder"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-php"       , "github" =>"https://github.com/mimaline/curso-php"				 , "2023-02-08", "faltas" =>0, "aluno" =>"Yasmim Aline"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-mysql-php" , "github" =>"https://github.com/gleisonschlemper/curso-mysql-php", "2023-02-08", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
    array("data" =>"2023-02-13", "repositorio" =>"CursoPHPSenac"   , "github" =>"https://github.com/guilhermeschr/CursoPHPSenac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
    array("data" =>"2023-02-13", "repositorio" =>"cursophpsenac"   , "github" =>"https://github.com/AlexAbreu88/cursophpsenac"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Alex Abreu"),
    array("data" =>"2023-02-13", "repositorio" =>"php-2023-Senac"  , "github" =>"https://github.com/matheusschramm/php-2023-Senac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Mateus Schram"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/FillipeGhs/curso-php-mysql"	     , "2023-02-08", "faltas" =>0, "aluno" =>"Fillipe"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/EduuCorrea/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Eduardo Correa"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/CarluUu/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Carlos Muller"),
    array("data" =>"2023-02-13", "repositorio" =>"curso-php-sql"   , "github" =>"https://github.com/BrunoSasse05/curso-php-sql"		 , "2023-02-08", "faltas" =>4, "aluno" =>"Bruno Sasse"),

    // NAO VEIO MAIS NA AULA...
    //array("data" =>"2023-02-08", "repositorio" =>"", "github" =>"https://github.com/", "2023-02-08", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
);


$aListaAtividades = array(
    // GIHUB OK
    array("data" =>"2023-02-14", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/Isaacleder/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Isaac Leder"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-php"       , "github" =>"https://github.com/mimaline/curso-php"				 , "2023-02-08", "faltas" =>0, "aluno" =>"Yasmim Aline"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-mysql-php" , "github" =>"https://github.com/gleisonschlemper/curso-mysql-php", "2023-02-08", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
    array("data" =>"2023-02-14", "repositorio" =>"CursoPHPSenac"   , "github" =>"https://github.com/guilhermeschr/CursoPHPSenac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
    array("data" =>"2023-02-14", "repositorio" =>"cursophpsenac"   , "github" =>"https://github.com/AlexAbreu88/cursophpsenac"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Alex Abreu"),
    array("data" =>"2023-02-14", "repositorio" =>"php-2023-Senac"  , "github" =>"https://github.com/matheusschramm/php-2023-Senac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Mateus Schram"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/FillipeGhs/curso-php-mysql"	     , "2023-02-08", "faltas" =>0, "aluno" =>"Fillipe"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/EduuCorrea/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Eduardo Correa"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/CarluUu/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Carlos Muller"),
    array("data" =>"2023-02-14", "repositorio" =>"curso-php-sql"   , "github" =>"https://github.com/BrunoSasse05/curso-php-sql"		 , "2023-02-08", "faltas" =>4, "aluno" =>"Bruno Sasse"),

    // NAO VEIO MAIS NA AULA...
    //array("data" =>"2023-02-08", "repositorio" =>"", "github" =>"https://github.com/", "2023-02-08", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
);

$aListaAtividades = array(
    // GIHUB OK
    array("data" =>"2023-02-15", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/Isaacleder/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Isaac Leder"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-php"       , "github" =>"https://github.com/mimaline/curso-php"				 , "2023-02-08", "faltas" =>0, "aluno" =>"Yasmim Aline"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-mysql-php" , "github" =>"https://github.com/gleisonschlemper/curso-mysql-php", "2023-02-08", "faltas" =>0, "aluno" =>"Gleyson Schlemper"),
    array("data" =>"2023-02-15", "repositorio" =>"CursoPHPSenac"   , "github" =>"https://github.com/guilhermeschr/CursoPHPSenac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Guilherme Schroeder"),
    array("data" =>"2023-02-15", "repositorio" =>"cursophpsenac"   , "github" =>"https://github.com/AlexAbreu88/cursophpsenac"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Alex Abreu"),
    array("data" =>"2023-02-15", "repositorio" =>"php-2023-Senac"  , "github" =>"https://github.com/matheusschramm/php-2023-Senac"	 , "2023-02-08", "faltas" =>0, "aluno" =>"Mateus Schram"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/FillipeGhs/curso-php-mysql"	     , "2023-02-08", "faltas" =>0, "aluno" =>"Fillipe"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/EduuCorrea/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Eduardo Correa"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-php-mysql" , "github" =>"https://github.com/CarluUu/curso-php-mysql"		 , "2023-02-08", "faltas" =>0, "aluno" =>"Carlos Muller"),
    array("data" =>"2023-02-15", "repositorio" =>"curso-php-sql"   , "github" =>"https://github.com/BrunoSasse05/curso-php-sql"		 , "2023-02-08", "faltas" =>4, "aluno" =>"Bruno Sasse"),

    // NAO VEIO MAIS NA AULA...
    //array("data" =>"2023-02-08", "repositorio" =>"", "github" =>"https://github.com/", "2023-02-08", "faltas" =>4, "aluno" =>"Douglas Regis Hammes"),
);


