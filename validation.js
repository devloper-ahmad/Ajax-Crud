jQuery('#fm').validate({
  
    rules:{
        firstname:"required",
        lastname:"required",
        email:{
            required: true,
            email: true
        },
        phone:{
            required: true,
            digits: true
        },
    },
    messages:
    {
        firstname:"Please enter your name",
        lastname:"Please enter your last name",
    
},

});