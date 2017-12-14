<nav class="navbar">
    <!--<div class="container-fluid">-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
<div class="container" id="header">
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <?php
            require_once '/../connection.php';
            $db = Db::getInstance();
            $categories = $db->getCategories();

            $subcategories = array();
            foreach ($categories as $category) {
                $path = explode(',', $category['path']);
                if (count($path) == 2 && $category['active'] == 1) {
                    $parent = $db->getCategory($path[1]);
                    $subcategories[] = $category;
                }
            }
            $subcategories_string = '';
            foreach ($categories as $category) {
                $path = explode(',', $category['path']);
                if (count($path) == 1 && $category['active'] == 1) {
                    echo '<li class="dropdown">
                                <button class="btn btn-lg dropdown-toggle category" type="button" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' . $category['name'] . '
                            <span class="caret"></span>
                        </button>';
                    $ul_initialized = 0;
                    foreach ($subcategories as $subcategory) {
                        $path = explode(',', $subcategory['path']);
                        if ($category['id_category'] == $path[1]) {
                            if ($ul_initialized == 0) {
                                echo '<ul class="dropdown-menu">';
                                $ul_initialized = 1;
                            }
                            echo '<li class="btn-lg subcategory">' . $subcategory['name'] . '</li>';
                        }
                    }
                    if ($ul_initialized == 1) {
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
</div>
<!--</div>-->
</nav>