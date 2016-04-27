//call on "Account and Purchases" page
function RPHreset()
{
    document.getElementById("entirePAGE").reset();
    console.log("I connect to the js. page using the reset button");

    //document.getElementById("stauts1").textContent = "";
    document.getElementById("status1").textContent="";
    document.getElementById("status2").textContent="";
    document.getElementById("status3").textContent="";
    document.getElementById("status4").textContent="";
    document.getElementById("status5").textContent="";
    document.getElementById("status6").textContent="";
    document.getElementById("status7").textContent="";
    document.getElementById("status10").textContent="";
    document.getElementById("status24").textContent="";
}

function ATTEMPT()
{

    console.log("I connect to the js. page");

}


//intro alert
function warningRPH()
{

    alert("Welcome. The following products are shown in detailed with their attributes described. Click on the Account and Purchases link to \
make a final purchase");

}

//asking the user for their first then last name
function nameFunction(inputName, displayName)
{
    
    console.log("got name here");
    //name of input, name of display
    var x = document.getElementById(inputName);
    // "/^( )*" any number of spaces at begining of text
    // "([A-z]([a-z])*[ ][A-z]([a-z])*)" capital word of any size, with a space and another
    // capital word
    
    console.log(x);

    var pattern = /^( )*([A-z]([a-z])*[ ][A-z]([a-z])*)|([A-z]*[ ][A-z]*)( )*$/
    //[a-z]any number |space| [a-z] any number

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Error: must include first and last name seperated by a space";
        return false;
    }
    else {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

//asking the user for their first then last name
function livingFunction(inputName, displayName) {
    //name of input, name of display
    var x = document.getElementById(inputName);
    // any size number, a name/2names

    var pattern = /^( )*([0-9]*[ ](([A-z]*)|([A-z]*[ ][A-z]*)))( )*$/
    //[a-z]any number |space| [a-z] any number
    //alert( "hi " + inputName + displayName + pattern.test(x.value));

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid Address Details: must have the number followed by street name";
        return false;
    }
    else {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}



//asking the user for the name of the card they will pay with
function creditCardNameFunction(inputName, displayName) {
    console.log("the old is working here");
    //name of input, name of display
    var x = document.getElementById(inputName);
    // "/^( )*" any number of spaces at begining of text
    // "([A-z]([a-z])*[ ][A-z]([a-z])*)" capital word of any size, with a space and another


    var pattern = /^( )*((Visa)|(MasterCard)|(American Express))( )*$/
    //[a-z]any number |space| [a-z] any number

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid Card Details: only accept a card of the list with the first letter capitalized";
        return false;
    }
    else {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

//asking the user for the name of the card they will pay with
function creditCardNameFunction2(inputName, displayName) {
    console.log("got new here");
    var x = document.getElementById(inputName);
    console.log(x);
    console.log("I connected to the second credit card function");
    document.getElementById(displayName).textContent = "PHUBBS23";
    return true;
}

// Second problem: SSN
function phoneFunction(inputName, displayName) {
    //name of input, name of display
    var x = document.getElementById(inputName);
    var pattern = /^( )*(\d{3}\d{3}\d{4})|(\d{3}-\d{3}-\d{4})( )*$/;
    //alert( "hi " + inputName + displayName + pattern.test(x.value));

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid Phone Number: submit with xxx-xxx-xxxx format";
        return false;
    }
    else {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

// Second problem: SSN
function SocialFunction1(inputName, displayName)
{
    //name of input, name of display
    var x = document.getElementById(inputName);
    var pattern = /^( )*\d{3}-\d{2}-\d{4}( )*$/;
    //alert( "hi " + inputName + displayName + pattern.test(x.value));

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid SSN";
        return false;
    }
    else
    {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

// Third problem: Credit Card Number
function creditCardFunction(inputName, displayName)
{
    //name of input, name of display
    var x = document.getElementById(inputName);
    var pattern = /^( )*([0-9]){4}(([ ]|[-])?([0-9]){4})(([ ]|[-])?([0-9]){4})(([ ]|[-])?([0-9]){4})?( )*$/;
    //alert( "hi " + inputName + displayName + pattern.test(x.value));

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid credit card number";
        return false;
    }
    else
    {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

//Fourth problem: Date
function specialDateFunction(inputName, displayName)
{
    //name of input, name of display
    var x = document.getElementById(inputName);

    // | means "or"
    //0-9 or 1 and 1-2
    //0-9, or 1-2 and 0-9, or 3 and 0-1
    // "\/" allows "/" to display
    //17
    var pattern = /^( )*([1-9]|([1][0-2]))\/([1-9]|([1-2][0-9])|(3[0-1]))\/(175[3-9]|17[6-9][0-9]|1[8-9][0-9][0-9]|20[0-9][0-9]|2100)( )*$/;
    //1753 to 2100
    // Valid date in dd/mm/yyyy format:
    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false)) {
        document.getElementById(displayName).textContent = "Invalid date:";
        return false;
    }
    else {
        document.getElementById(displayName).textContent = "";
        return true;
    }
}

// Fifth problem: Abbreviation
function stateAbbrevFunction(inputName, displayName)
{
    //name of input, name of display
    var x = document.getElementById(inputName);
    var pattern = /^( )*(AZ|CA|CO|CT|DE|FL|GA|HI|IA|ID|IL|IN|KS|KY|LA|MA|MD|ME|MI|MN|MO|MS|MT|NC|ND|NE|NH|NJ|NM|NV|NY|OH|OK|OR|PA|RI|SC|SD|TN|TX|UT|VA|VT|WA|WI|WV|WY|)( )*$/;

    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false))
    {
        document.getElementById(displayName).textContent="Invalid state abbreviation";
        //alert("bad");
        return false;
    }
    else
    {
        document.getElementById(displayName).textContent="";
        //alert("good");
        return true;
    }
}

// Sixth problem: Money
function cashAmount(inputName, displayName)
{
    //name of input, name of display
    var x = document.getElementById(inputName);
    var pattern = /^( )*([$]|())(([1-9])|([1-9][0-9])|([1-9][0-9][0-9]))(([0-9][0-9][0-9])|((,)[0-9][0-9][0-9])|())*(((.)[0-9][0-9])|())( )*$/;
    if ((x.value == null) || (x.value == "") || (pattern.test(x.value) == false))
    {
        document.getElementById(displayName).textContent = "Invalid money amount";
        //alert("bad");

    }
    else
    {
        document.getElementById(displayName).textContent = "";
        //alert("good");
    }
}

function FinalizePurchase()
{
    if ((nameFunction('name1', 'status1') == false) || (livingFunction('living1', 'status2') == false)
    || (stateAbbrevFunction('state1', 'status3') == false)
    || (phoneFunction('phone1', 'status4') == false)
    || (creditCardNameFunction('pay1', 'status5') == false)
    || (creditCardFunction('card1', 'status6') == false)
    || (specialDateFunction('date1', 'status7') == false)
    || ((document.getElementById("myCheck1").checked == false) &&
        (document.getElementById("myCheck2").checked == false) && (document.getElementById("myCheck3").checked == false)))
    {
        //alert("bad move")
        if((document.getElementById("myCheck1").checked == false) &&
           (document.getElementById("myCheck2").checked == false) && (document.getElementById("myCheck3").checked == false))
        {
            document.getElementById('status10').textContent = "Please Mark the bag you wish to purchase";
        }
        else
        {
            document.getElementById('status10').textContent = "";
        }
        document.getElementById('status24').textContent = "Error. Please insert data along with items of purchase. Press submit once data is set";
    }
    else
    {
        //var x = document.getElementById(inputName);
        //var pattern = /^( )*([0-9]*[ ](([A-z]*)|([A-z]*[ ][A-z]*)))( )*$/
        //[a-z]any number |space| [a-z] any number
        //alert( "hi " + inputName + displayName + pattern.test(x.value));
        var bag1;
        var bag2;
        var bag3;
        if (document.getElementById("myCheck1").checked == true)
        { bag1 = 50; }
        else
        { bag1 = 0; }
        if (document.getElementById("myCheck2").checked == true)
        { bag2 = 25; }
        else
        { bag2 = 0; }
        if (document.getElementById("myCheck3").checked == true)
        { bag3 = 55; }
        else
        { bag3 = 0; }

        var total1 = bag1 + bag2 + bag3;

        document.getElementById('status10').textContent = "";

        document.getElementById('status24').textContent = "";

        //now alert the customer of what their item will cost and when it will reach them
        alert("Thank you for your purchase, your product(s) will cost $" + total1 +" and reach you within two weeks.")
    }
}
