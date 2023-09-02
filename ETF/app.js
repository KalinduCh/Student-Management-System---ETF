
            let stdDataBase = [];
            const addData = (ev)=>{
              ev.preventDefault();
              let stdData = {
                fname : document.getElementById('fname').value,
                lname : document.getElementById('lname').value,
                dob : document.getElementById('dob').value,
                email : document.getElementById('email').value,
                country : document.getElementById('country').value,
                center : document.getElementById('center').value,
                CGPA : document.getElementById('CGPA').value,
                sid : Date.now()
              }
              stdDataBase.push(stdData);
              //document.querySelector('form').reset();

              alert('Successfully Added!');

              console.warn('added' , {stdDataBase});

              localStorage.setItem('StudentDataList' , JSON.stringify(stdDataBase) );
            }
            document.addEventListener('DOMContentLoaded', ()=>{
                document.getElementById('submit').addEventListener('click', addData);
            });
