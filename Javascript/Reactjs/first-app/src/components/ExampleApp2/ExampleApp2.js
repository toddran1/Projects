import React, { Component } from 'react';
import Person from '../Person/Person';

class ExampleApp2 extends Component {
  state = {
    persons: [
      { name: 'Max', age: 28 },
      { name: 'Manu', age: 29 },
      { name: 'Stephanie', age: 26 }
    ],
    addPerson: { name: "", age: ""}
  };

  addNameHandler = () => {
    let listOfPersons = [...this.state.persons];
    let resetPerson = { name: "", age: ""};
    listOfPersons[listOfPersons.length] = this.state.addPerson;
    this.setState({persons: listOfPersons}); 
    this.setState({addPerson: resetPerson});
  }//addNameHandler

  onChangeInputHandler = (e) => {
    e.preventDefault();
    let person = {...this.state.addPerson};
    if(e.target.id === "name") {
        person.name = e.target.value;
    }//if1
    if(e.target.id === "age") {
        person.age = e.target.value;
    }//if2

    this.setState({addPerson: person});
    }//onChangeInputHandler

  displayContent = () => {
    const showAll = this.state.persons.map((item, index) => {
        return (
            <Person
                name={this.state.persons[index].name}
                age={this.state.persons[index].age}
        />
        );
        })//showall

        return showAll;
  }//display

  
  render() {
    return (
      <div className="ExampleApp">
        
        <button onClick={this.addNameHandler}>Add New Person</button>
        
        <input id="name" value={this.state.addPerson.name} placeholder="Name" type="input" onChange={this.onChangeInputHandler}/>       
        <input id="age" value={this.state.addPerson.age} placeholder="age" type="input" onChange={this.onChangeInputHandler}/>       
        
        {this.displayContent()}
      </div>
    );
    // return React.createElement('div', {className: 'App'}, React.createElement('h1', null, 'Does this work now?'));
  }
}

export default ExampleApp2;
