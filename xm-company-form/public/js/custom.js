
$(function() {
    var from = $("#start_date")
        .datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#end_date").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        var dateFormat = "yy-mm-dd";
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }
    $("#companyForm").validate({
        rules: {
            symbol: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true
            },
            email: {
                required: true,
                email: true
            },

        },
        messages: {
            symbol: {
                required: "Please Select your Symbol"
            },
            start_date: {
                required: "Please enter your Start Date"
            },
            end_date: {
                required: "Please enter your End Date"
            },
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },

        }
    });

});