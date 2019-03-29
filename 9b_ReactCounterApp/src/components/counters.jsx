import React, { Component } from "react";
import Counter from "./counter";

class Counters extends Component {
  render() {
    return (
      <div>
        <button className="badge" onClick={this.props.onReset}>
          Reset
        </button>
        {this.props.countersData.map(counter => (
          <div>
            <h4>Counter #{counter.id}</h4>
            <Counter
              onDelete={this.props.onDelete}
              onIncrement={this.props.onIncrement}
              onDecrement={this.props.onDecrement}
              counter={counter}
              key={counter.id}
            />
          </div>
        ))}
      </div>
    );
  }
}

export default Counters;
