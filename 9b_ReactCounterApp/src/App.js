import React, { Component } from "react";
import NavBar from "./components/navBar";
import "./App.css";
import Counters from "./components/counters";

class App extends Component {
  state = {
    countersData: [
      { id: 1, value: 1 },
      { id: 2, value: 2 },
      { id: 3, value: 3 },
      { id: 4, value: 4 }
    ]
  };

  handleDelete = counter => {
    const cFiltered = this.state.countersData.filter(c => c.id !== counter.id);
    this.setState({ countersData: cFiltered });
  };

  handleIncrement = counter => {
    const countersNewData = this.state.countersData.map(c => {
      if (c.id == counter.id) {
        c.value = c.value + 1;
      }
      return c;
    });
    this.setState({ countersData: countersNewData });

    /* Alternative:
    const counters = [...this.state.countersData];
    const index = counters.indexOf(counter);
    counters[index] = { ...counter };
    counters[index].value++;
    this.setState({ countersData: counters }); */
  };

  handleDecrement = counter => {
    const countersNewData = this.state.countersData.map(c => {
      if (c.id == counter.id) {
        c.value = c.value - 1;
      }
      return c;
    });
    this.setState({ countersData: countersNewData });
  };

  handleReset = () => {
    const countersNewData = this.state.countersData.map(c => {
      c.value = 0;
      return c;
    });
    this.setState({ countersData: countersNewData });
  };

  render() {
    return (
      <div>
        <NavBar
          totalCounters={
            this.state.countersData.filter(c => {
              return c.value > 0;
            }).length
          }
        />
        <main className="container">
          <Counters
            onReset={this.handleReset}
            onIncrement={this.handleIncrement}
            onDecrement={this.handleDecrement}
            onDelete={this.handleDelete}
            countersData={this.state.countersData}
          />
        </main>
      </div>
    );
  }
}

export default App;
