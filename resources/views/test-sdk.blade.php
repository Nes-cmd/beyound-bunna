<html>
    <style>
        .tabs {
    width: auto;
    color: cadetblue;
    border: 0ch;
    background-color: wheat;
    padding: 5px;
    width: 40%;
    height: 10%;
    margin: 10px;
    text-align: center;
    line-height: 20px
}

h1{
    color: green;
}
.tab-container{
    padding: 0;
    margin: 0;
    list-style: none;
    display: flex;
    justify-content: space-around;
   
}
body{
    padding-left: 0%;
}
.body{
    top: 25%;
        left: 50%;
    border: 2px solid black;
    width: 30em;
        height: 30em;
    padding-left: 10%;
    margin-top: -1em;
        margin-left: -15em;
        position: fixed;
}


input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
    </style>
    <body>
<ul class="tab-container">
    <button  class="tabs" onclick="onTabButtonClick('wallet')">
  <span><h1>wallet</h1></span>   
    </button>
    <button  class="tabs"  onclick="onTabButtonClick('profile')">
  <span> <h1>profile</h1></span>  
    </button>

</ul>

    
   

 <div id="profile" style="display: none"> 
    <h1>profile</h1>
<label for="name"> <h2>Name</h2> </label>
 <h1 id="name" ></h1>

 <label for="fname"> <h2>Last Name</h2> </label>
 <h1 id="fname"> </h1>
 
<label for="id"> <h2>ID</h2> </label>
 <h1 id="id"></h1>
</div>

<div id="wallet"  style="display: block">
<h1>wallet</h1>

  <div class="container">
    <form >
      <label for="Fname">First Name</label>
      <input type="text" id="Fname" name="firstname" placeholder="Your name..">
      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">
      <label for="pw">Pass word</label>
      <input type="text" id="pw" name="pw" placeholder="Your password ..">
      <input type="submit" value="Submit" onclick="toFlutter()">
    </form>
</div>

<div id="permission"  style="display: none">
    <h1>permission</h1>
</div>

<script type="text/javascript">
     function floatingActionButton(  name, id ,fname  ){ 
            console.log('floatingActionButton function called')
            console.log(id);
            document.getElementById('name').innerHTML = name;
            document.getElementById('fname').innerHTML= fname;
            document.getElementById('id').innerHTML = id;
            // flutter(fname,lname,country);
         }

        function toFlutter(  ){
            console.log('toflutter function called')
            var fname = document.getElementById('Fname').value;
            var lname = document.getElementById('lname').value;
            var pw = document.getElementById('pw').value;
            var ls = {'fname':fname, 'lname':lname, 'password': pw}
            messageHandler.postMessage(ls);
        }

        function onTabButtonClick( tabId){
            console.log('onTabButtonClick function called')
            if(tabId == 'wallet'){
                document.getElementById('profile').style.display= "none";
            document.getElementById('wallet').style.display= "grid";
            }
            else if (tabId =='profile'){
                document.getElementById('profile').style.display= "grid";
                document.getElementById('wallet').style.display= "none";
            }
        }
        </script>
    </body>
</html>