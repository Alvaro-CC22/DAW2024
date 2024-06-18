// function ask(question, yes, no) {
//     if (confirm(question)) yes();
//     else no();
//    }
//    ask(
//     "Do you agree?",
//     function() { alert("You agreed."); },
//     function() { alert("You canceled the execution."); }
//    );

let ask = (question, yes, no) => {
    if(confirm(question)){
        alert(yes)
    }
    else{
        alert(no)
    }
}

ask("Do you agree?", "You agreed.", "You canceled the execution.");