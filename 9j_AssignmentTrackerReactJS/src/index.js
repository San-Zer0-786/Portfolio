import React from 'react';
import ReactDOM from 'react-dom';
import AssignmentsData from "./data.js"
import './index.css';

class AssignmentTracker extends React.Component {
  constructor() {
      super()
      this.state= {
         assignmentsJSON : [],
         headerImg: "https://poster.keepcalmandposters.com/8738135.jpg",
         id: 0,
         title: "",
         deadline: "",
         setOn: "" 
      }
  }

  handleErrors = (response) => {
    if (!response.ok) {
      this.setState( {
        title: response.statusText
      })
      throw Error(response.statusText);
    }
    return response;
  }

  componentDidMount() {
    fetch('https://beehiveapi.lionhearttrust.org.uk/v3.5/planner/test/assignments?pageIndex=0&pageSize=20')
    .then(this.handleErrors)
    .then(response => response.json())
    .then((data) => {
      data.items.sort((a,b) => new Date(a.deadline) > new Date(b.deadline) ? 1 : -1);
      this.setState({ assignmentsJSON: data.items })
  }).catch((err) => {
    console.log (err)
    this.setState({
      title: err.toString()
      }
    )
  })   
  }

  changeAssignmentsData = (data) => {
    this.setState({
      id: data.id,
      title: data.title,
      deadline: data.deadline,
      setOn: data.setOn
    })
  }

  render() {
      if (this.state.assignmentsJSON) {
        var assignmentListItems = this.state.assignmentsJSON.map((data)=> <div className="col-sm-6 col-md-3" key={data.id}><input type="checkbox" className="assignmentsData-item-complete hidden" id={data.id}/><div data-key={data.id} onClick={()=>this.changeAssignmentsData(data)}>{data.title}</div> </div>);
      }
      return (
          <div className="row">
              <header>
                  <img className="center-block img-responsive w-25" src={this.state.headerImg} alt="Keep Calm and Do Your Assignment" />
                  <h1 className="text-center text-title">Homework Assignment Tracker</h1>
                  <hr/>
              </header>

              <div className="row assignment-items">
                  <AssignmentsData id={this.state.id} title={this.state.title} deadline={this.state.deadline} setOn={this.state.setOn}/>
                  {assignmentListItems}
              </div>
          </div>
      )
  }
}

ReactDOM.render(
  <AssignmentTracker/>,
  document.getElementById('root')
);




/* Developer Notes Taken Whilst this app was being made 

1- Use of CSS Input Checked in order to show assignments when clicked
2- Need to determine if radio buttons or check boxes are best for 1 
3- Dev thinks a good sense of humour is good for teamwork and even better in a education environment
4- Due to 3, an image has been selected appropiately
5- Initialise state to have data called assignmentsJSON, an array that can take in JSON data via fetch GET request done in React lifecycle method
componentDidMount() 
6- Re-factor img src of image selected in 3 to make use of initialising state, data called headerImg
7- Radio buttons for 2 would be better - if it were to look like an UI then one at a time only
8- Given URL endpoints not working unfortunately, have emaled Graham
9- Using a meme api instead in the mean time
10- Use .map to loop through and display assignmentJSON prop in state after the array has been filled due to fetch in lifecycle hook
11- Hence, display each list item by 10's .map loop
12- Will submit 2 versions one version where endpoint JSON is saved in data.js
13- Disregard 12, found issue with object destructuring, app is working now with fetch
14- Upon observation of logging the response, the list items are already sorted by id
15- However will still deploy .sort and test to ensure assignments are ordered by date
16- Disregard, needs to be sorted by deadline not id
17- Got it sorted in deadline order but need to be soonest deadline first so will swap < to > in line 34 (previously line 19 but error handling added) 
18- Assignments now order from soonest deadline, 9th Sep, to latest, 29th Oct
19- Use onclick for each list item that passes data variable into function changeAssignmentsData so state can be updated
20- These state properties then passed to child component AssignmentsData
21- Added data-key attributes to all list items which are now divs instead and ul/li is not necessary
22- Design choice - looks better when assignment is showing on top of 10 by 2 assignment rows and columns
23- Tiny detail fix where Assignment ID will not show default value of 0 when app starts
24- Reflection: using radio buttons as mentioned in 6 etc. not needed
25- col-md-3 looks even better since the UI is more compact but big enough to select different assignments
26- Input type of checkbox positioned just above each div which shows the title of assignment
27- Label in the detail view is connected to each checkbox above, CSS Trick and less JS means better performance
28- Hence, CSS trick of creating visual effects when checkbox is ticked or not is now used
29- Checkboxes for each assignment should not be seen so .hidden class made
30- display:none is recommended for .hidden class but this is bad for accessiblity
31- .hidden class uses absolute positioning and small 1px height not viewable by user, passes screen-reader accessiblity tests
32- Responsive on tablet (768px down) view, overflow-x:hidden for html, margin to title so goes to 2 lines for better readability when needed
33- Fine tuning; adding max-height to ensure during resizing there is no box greater than another, font-weight added
34- The outer div needs key prop, not the child of it for line 57 thus has been amended
35- Text shadow effect added when assignment marked as complete for easier visual indication
36- Used after element content: "\2713" when checkbox ticked after complete assignment button clicked for more visual indication
37- favicon.ico changed to the Keep Calm logo
*/