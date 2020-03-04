import React, { Component } from 'react';
import './App.css';
import Person from './components/Person/Person';
import Greeting from './components/Greeting/Greeting';
import ExampleApp2 from './components/ExampleApp2/ExampleApp2';

class App extends Component {
  state = {

  };

  

  render() {
    return (
      <div className="App">
            <Greeting/>
            <ExampleApp2/>
      </div>
    );
    // return React.createElement('div', {className: 'App'}, React.createElement('h1', null, 'Does this work now?'));
  }
}

export default App;
