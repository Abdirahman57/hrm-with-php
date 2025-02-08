let formgroup = document.querySelector(".form-group");
let username = document.querySelector("#usertxt");
let password = document.querySelector("#passtxt");
let loginbtn = document.querySelector(".login");
let form = document.querySelector("#form")

let showerror = (input, message, message2) =>{
     let parentElement = input.parentElement;
     parentElement.classList= 'form-group error';
     
    const small = parentElement.querySelector("small");
    small.innerText= message;
    small.style.visibility = 'visible'
    const Message = document.querySelector(".Message")
    Message.style.visibility="visible";
    Message.classList="Message error2";
   
   Message.innerText=message2;
  

}
let showsuccess = async (input,message) =>{
    let parentElement = input.parentElement;
    parentElement.classList= 'form-group';
   // console.log(input)
   const small = parentElement.querySelector("small");
    small.style.display = 'none'
    
    const Message = document.querySelector(".Message")
    Message.style.visibility="visible";
    Message.classList="Message success";
   
    Message.innerText=message;
    
    setTimeout(()=>{
        alert(message);
        
        // window.location.href ="http://127.0.0.1:5500/Javascript/login%20cheking/home.html";
        setTimeout(()=>{
             window.location.href ="../../Web developing/Hafun/Home.html";
        },1000)
    },800)
   
}
let checkEmpty = (element) =>{
    element.forEach( (element) =>{
        if(element.value === ''){
            showerror(element, 'input required','Your confirmation Process is wrong');
        }else if(username.value ==="abdi" && password.value ==="123"){
            showsuccess(element,'Your confirmation Process is Success');
            
        }
       
        
      
        else {
            showerror(element, 'Your password or username is wrong','Your confirmation Process is a little bit complicated');
                }
    }) 
}
form.addEventListener('submit', (event)=>{
    event.preventDefault();
    checkEmpty([username, password]);
   
})

