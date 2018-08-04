AMT.Form.Util = {
    
    countFalseEmpty: function(value)
    {
        var count = 0;

        for (var i = 0; i < value.length; i++)
        {
            if (value.charAt(i) == " " || value.charAt(i) == "\n")
            {
                count++;
            }
        }

        if (count == value.length)
        {
            return true;
        }

        return false;
    },
    
    checkEmpty: function(field, value)
    {
        var type = $(field)[0].type;
        var name = $(field)[0].name;

        if (type == 'radio' || type == 'checkbox')
        {
            if (!$('input[name="' + name + '"]:checked').length)
            {
                return true;
            }
        }

        if (value == null || value == "" || this.countFalseEmpty(value))
        {
            return true;
        }

        return false;
    },
    
    capitalize: function(label)
    {
        var array = label.split(' ');
        var string = '';

        for (var i = 0; i < array.length; i++)
        {
            array[i] = (array[i].slice(0, 1)).toUpperCase() + array[i].slice(1);
        }

        string = array.join(' ');

        return string;
    },
    
    singularize: function(elem)
    {
        var ies_pos = elem.lastIndexOf('ies');
        var s_pos = elem.lastIndexOf('s');

        if (ies_pos == elem.length - 3)
        {
            elem = elem.slice(0, elem.length - 3) + 'y';
        }
        else if (s_pos == elem.length - 1)
        {
            elem = elem.slice(0, elem.length - 1);
        }

        return elem;
    },
    
    pluralize: function(elem)
    {
        var y_pos = elem.lastIndexOf('y');

        if (y_pos == elem.length - 1)
        {
            elem = elem.slice(0, elem.length - 1) + 'ies';
        }
        else
        {
            elem = elem + 's';
        }

        return elem;
    },
    
    zeroPad: function(number, limit)
    {
        var numLength = String(number).length;
        var temp = String(number);

        for (var i = numLength; i < limit; i++)
        {
            temp = '0' + temp;
        }

        return temp;
    },
    
    numberCommas: function(number)
    {
        var components = number.toString().split(".");

        if (components.length === 1)
        {
            components[0] = number;
        }

        components[0] = components[0].replace(/\D/g, "");
        components[0] = components[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        if (components.length === 2)
        {
            components[1] = components[1].replace(/\D/g, "");
        }

        return components.join(".");
    }

};