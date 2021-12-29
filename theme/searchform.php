<div class="box-dark">
    <header class="title-dark">
        <h3>Busca</h3>
    </header>
    <form id="form-search" action="<?php bloginfo('url'); ?>" method="get" accept-charset="utf-8">
        <fieldset>
            <div class="form-group">
                <input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" placeholder="Critério de pesquisa" />
            </div>
            <input class="btn btn-primary btn-block btn-dark" type="submit" value="Procurar">
        </fieldset>
    </form>
</div>
