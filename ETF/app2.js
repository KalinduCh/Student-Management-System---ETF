const btn = document.getElementById("btn");

btn.addEventListener("click", () => {
    const data = localStorage.getItem("stdDataBase");
    const student = JSON.parse(data);

    document.getElementById("table").innerHTML = `
        <div>
            ${createTable(student)}
        </div>
    
    `;

});

const createTable = (student) => {

    return `
    <table class="styled-table" id="styled-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date Of Birth</th>
                <th>Country</th>
                <th>Center</th>
                <th>CGPA</th>
                <th>Scholrship</th>
                <th>Student ID</th>
            </tr>
        </thead>
        <tbody class="active-row">
            ${createTableData(student)}
        </tbody>
    </table>
    
    `;
};


const createTableData = (student) => {
    let html = "";
    student.array.forEach((student) => {
        html +=`
            <tr>
                <td>${student.fname}</td>
                <td>${student.lname}</td>
                <td>${student.dob}</td>
                <td>${student.country}</td>
                <td>${student.center}</td>
                <td>${student.CGPA}</td>
                <td>${student.checkbox}</td>
                <td>${student.sid}</td>

            </tr>
        `
    });
};