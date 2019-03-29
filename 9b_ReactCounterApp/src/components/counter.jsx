import React, { Component } from "react";

class Counter extends Component {
  /* renderTags() {
    return this.state.tags.length === 0 ? (
      "No tags"
    ) : (
      <ul>
        {this.state.tags.map(item => (
          <li key={item.id}>{item.tag}</li>
        ))}
      </ul>
    );
  } */

  render() {
    return (
      <div>
        {this.props.counter.value}
        <br />
        <button
          className="badge"
          onClick={() => this.props.onIncrement(this.props.counter)}
        >
          Increment
        </button>
        <button
          className="badge"
          onClick={() => this.props.onDecrement(this.props.counter)}
        >
          Decrement
        </button>
        <button
          onClick={() => this.props.onDelete(this.props.counter)}
          className="btn-danger m-2"
        >
          Delete
        </button>
        <hr />
      </div>
    );
  }
}

export default Counter;
