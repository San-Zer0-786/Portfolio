import React from "react"

class AssignmentsData extends React.Component {
    constructor() {
        super()
        this.state= {
           complete: false
        }
    }

    changeChecked = () => { 
        this.setState({
            complete: this.state.complete ? false : true
        })
    }

    render() {
        const assignmentsDataStyling = {backgroundColor: this.state.complete ? "green" : "transparent", color: this.state.complete ? "white" : "black" , padding: "24px", fontSize: "18px", transition: "all 0.7s", textAlign: "center", border: "1px solid blue"}
        return(
            <div className="assignmentsData-item col-md-12 assignment-items-details"  style={assignmentsDataStyling}>
                
                <h2>{this.props.title}</h2>
                <p>Assignment Given On: {this.props.setOn}</p>
                <p>Assignment Deadline: {this.props.deadline}</p>
                <p>Assignment ID: {this.props.id === 0 ? "" : this.props.id}</p>

                <label className="assignmentsData-item-btn" htmlFor={this.props.id}>
                    Complete Assignment
                </label>
                
            </div>
        )
    }
}
export default AssignmentsData