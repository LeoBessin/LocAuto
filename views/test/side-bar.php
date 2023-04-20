<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <style>
    body{
      margin: 0;
    }
  .NavBar {
    background: blanchedalmond;
    height: 9vh;
    position: sticky;
    margin: 0;
    padding: 0;
    z-index: 2;
  }
  .NavBar-content{
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin: 0;
    padding: 0;
  }
  #side-bar{
    background: blue;
    height: 100vh;
    position: absolute;
    z-index: 0;
    top: 0;
    transition: ease-in-out .4s;
  }
  .show-side-bar{
    left: 70vw;
    width: 30vw;
  }
  .hide-side-bar{
    left: 100vw;
    width: 0vw;
  }

  </style>
</head>
<body>
  <nav class="NavBar">
    <ul class="NavBar-content">
      <li><a href="default.asp">Home</a></li>
      <li><a href="news.asp">News</a></li>
      <li><a href="contact.asp">Contact</a></li>
      <li><a href="about.asp">About</a></li>
    </ul>
  </nav>
  <button onclick="change_side_bar_state()">Expand side_bar</button>
  <div id="side-bar" class="show-side-bar">

  </div>
</body>
<script>
  const side_bar_div = document.getElementById("side-bar")
  const change_side_bar_state = () => {
    if(side_bar_div.getAttribute("class")==="show-side-bar"){
      side_bar_div.setAttribute("class","hide-side-bar");
    } else {
      side_bar_div.setAttribute("class","show-side-bar");
    }
  }
</script>
</html>