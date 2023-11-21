var route = {
    method: {},
    application: {
        DefaultPage: '?page=dashboard-index',
        ContentWrapper: '#PageMainWrapper',
        htmlPageName: ''
    }
};

route.method.routeInit = function() {
    route.method.loadPageAsync();    
    window.onpopstate = function(){
        route.method.loadPageAsync();
    }
    if(!route.method.getParameterByName('page')){
        route.method.loadNewBtnPage(route.application.DefaultPage);
    }
}

/*url routing */
$(document.body).on('click', "a.int-link", function(event) {
    if (!event.ctrlKey) {
        event.preventDefault();
        url = $(this).attr("href");
        route.method.loadNewBtnPage(url);
    } else {
        url = $(this).attr("href");
    }
});

route.method.loadPageAsync = function() {
    var queryPageName = route.method.getParameterByName('page');
    if (queryPageName) {
        var directoryName = queryPageName.split("-");
        var url="";
        $.each( directoryName, function( key, value ) {
            url+="/"+value;
          });
        htmlPageName = queryPageName.split("-").pop();
        var htmlPageUrl = 'views/pages' + url + '.php';

        /* UI -- navbar & subnavbar active */
        $('.menu-nav ul li').removeClass('active');
        $('[data-dir="'+ directoryName +'"]').addClass('active');
        $('.page-directory').html(directoryName);
        $('.page-title').html(htmlPageName);
        
        /* UI -- navbar & subnavbar active ends */

        $(route.application.ContentWrapper).html('<div class="containercenterflex"><div class="spinner-border spinner-border-lg text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>').load(htmlPageUrl);
        //.load(htmlPageUrl)
    }
}

route.method.loadNewBtnPage = function(pageName) {
    var query = pageName;
    window.history.pushState('', '', query);
    route.method.loadPageAsync();
}

route.method.getParameterByName = function(name, url) {

    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

route.method.goBack = function(){
    window.history.back();
}
/*url routing ends*/

