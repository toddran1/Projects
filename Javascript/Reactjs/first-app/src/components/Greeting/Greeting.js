// src/components/content/Greeting.js
import React, {Component} from 'react';
//require ('./Greeting.css');
 
/* Greetin React component */
class Greeting extends Component {
    
    componentWillMount() {
        console.log("Greeting Props: ", this.props);
    }

    /*
    // function to get all fieldset names
     innerContent = () => {
         let names = " Kobe Bryant";
         if(this.props.greetingFields.first != null) {
            names += " " + this.props.greetingFields.first;
        }//if1
        if(this.props.greetingFields.middle != null) {
            names += " " + this.props.greetingFields.middle;
        }//if2
        if(this.props.greetingFields.last != null) {
            names += " " + this.props.greetingFields.last;
        }//if3 
            return names;
    }//innerContent 
    */
    
 
    displayMessage = () => {
        
        const currentMonth = new Date().getMonth()+1; //.getMonth is 0 based.
        const currentDay = new Date().getDate();
        //const currentYear = new Date().getFullYear();
        
        // Default static birthdate variable to show for now 
        const birthdayDay = 2;
        const birthdayMonth = 3;
        const thresh = 5;
        const happyBDayMessage = "Happy Birthday!";
        const standardMessage = "Hello!"
        
        // console.log("The current time is: ",new Date());
        // console.log("current day: ", currentMonth, " ", currentDay, " ", currentYear);

        // conditional to see if users birth today or in threshold range
            if(birthdayMonth === currentMonth) {
                if(((currentDay - thresh) <= birthdayDay) && (birthdayDay <= (currentDay + thresh))) {
                    return happyBDayMessage;
                }//if2
            }//if1
                
            return standardMessage;

    }//birthdaycontent
 
    render() {
        
      return (
            <div className="Greeting">

                <div className="page__header_section">
                    <header className="page__header user-greeting">
                        <h1 className="heading-style-1 user-greeting__heading">{this.displayMessage()}</h1>
                    </header>
                </div>

            </div>
        );
    }//render
}//greeting class
 
export default Greeting;