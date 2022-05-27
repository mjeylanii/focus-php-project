(function ($, window, document) {

    // The $ is now locally scoped 

    $(function () {
        countries();
    });

    function countries() {
        const selectList = $('#country');
        var closure = "</option>";

        fetch('https://restcountries.com/v3.1/all').then(res => {
            return res.json();
        }).then(data => {
            let output = "";
            data.forEach(country => {
                country.name;
                console.log(country.name);
                output += '<option value="' + ${country.name} +'">' + ${country.name} +closure;
                console.log(output);
            })
            selectList.html = output;
        }).catch(err => {
            console.log(err);
        })
    }

    // The rest of the code goes here!

}(window.jQuery, window, document));

