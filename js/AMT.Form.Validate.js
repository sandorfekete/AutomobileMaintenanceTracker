AMT.Form.Validate = {
    
    validateChars: function(value)
    {
        if (value.match(/%|\\|<|>|www|http|php\?/i))
        {
            return false;
        }

        return true;
    },
    
    validateEmail: function(value)
    {
        var atPos = value.indexOf("@");
        var dotPos = value.lastIndexOf(".");
        var ats = value.match(/@/gi);
        var spaces = value.match(/\s/gi); //console.log(spaces);

        if (atPos < 1 || dotPos - atPos < 2 || ats.length > 1 || spaces)
        {
            return false;
        }

        return true;
    },
    
    validateDigits: function(value)
    {
        return value.match(/[0-9]/g);
    },
    
    validateDate: function(value)
    {
        return value.match(/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/i);
    },
    
    validatePostalCode: function(value)
    {
        return value.match(/[a-z][0-9][a-z][\s]?[0-9][a-z][0-9]/i);
    }

};