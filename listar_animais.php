<?php
    // the page where this paging is used
    $page_dom = "listar_animais.php";
    
    echo "<ul class=\"pagination\">";
    // page given in URL parameter, default page is one
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // set number of records per page
    $records_per_page = 3;
    
    // calculate for the query LIMIT clause
    $from_record_num = ($records_per_page * $page) - $records_per_page;
    // button for first page
    if($page>1){
        echo "<li><a href='{$page_dom}' title='Go to the first page.'>";
            echo "<<";
        echo "</a></li>";
    }

    // include database and object files
    include_once 'conexao/database.php';
    include_once 'classes/c_cad_principal.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();

    $cad_principal = new Cad_Principal($db);

    // query products
    $stmt = $cad_principal->listar( $page, $from_record_num, $records_per_page);
    $num = $stmt->rowCount();
    
    // display the products if there are any
    if($num>0){
    
        
        echo "<table class='table table-hover table-responsive table-bordered'>";
            echo "<tr>";
                echo "<th>Produto</th>";
                echo "<th>Preço</th>";
                echo "<th>Descrição</th>";
                echo "<th>Ação</th>";
            echo "</tr>";
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
                extract($row);
    
                echo "<tr>";
                    echo "<td>{$rghv}</td>";
                    echo "<td>{$nome_comun}</td>";
                    echo "<td>{$nome_cientifico}</td>";
    
                    echo "<td>";
        // edit and delete button is here
        echo "<a href='atualiza_produto.php?id={$id_cfau}' class='btn btn-default left-margin'>Atualliza</a>";
        echo "<a delete-id='{$id_cfau}' class='delete-object'>Delete</a>";
            echo "</td>";

    
                echo "</tr>";
    
            }
    
        echo "</table>";
    
        // paging buttons will be here
    }
    
    // tell the user there are no products
    else{
        echo "<div>Nenhum produto encontrado.</div>";
    }
    // count all products in the database to calculate total pages
    $total_rows = $cad_principal->contarTodos();
    $total_pages = ceil($total_rows / $records_per_page);
    
    // range of links to show
    $range = 2;
    
    // display links to 'range of pages' around 'current page'
    $initial_num = $page - $range;
    $condition_limit_num = ($page + $range)  + 1;
    
    for ($x=$initial_num; $x<$condition_limit_num; $x++) {
    
        // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
        if (($x > 0) && ($x <= $total_pages)) {
    
            // current page
            if ($x == $page) {
                echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
            } 
    
            // not current page
            else {
                echo "<li><a href='{$page_dom}?page=$x'>$x</a></li>";
            }
        }
    }
    
    // button for last page
    if($page<$total_pages){
        echo "<li><a href='" .$page_dom . "?page={$total_pages}' title='Last page is {$total_pages}.'>";
            echo ">>";
        echo "</a></li>";
    }
    
    echo "</ul>";
?>