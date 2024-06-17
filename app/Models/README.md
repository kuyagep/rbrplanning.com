-- Active: 1693630720113@@127.0.0.1@3306@rbrplanning_com
To define the relationships between these models,
we can infer typical associations based on common school
management systems. Below is an outline of the
relationships that might exist between these models:

1. **Attendance.php**
   - Belongs to `RegisteredLearner.php`
   - Belongs to `SchoolYear.php`
   - Belongs to `Section.php`

2. **District.php**
   - Has many `School.php`

3. **Division.php**
   - Has many `District.php`

4. **DroppedOut.php**
   - Belongs to `RegisteredLearner.php`
   - Belongs to `SchoolYear.php`

5. **EmploymentStatus.php**
   - Belongs to `Personnel.php`

6. **ExtensionSchool.php**
   - Belongs to `School.php`

7. **FundingSource.php**
   - Has many `School.php`

8. **GradeLevel.php**
   - Belongs to `GradeLevelCategory.php`
   - Has many `RegisteredLearner.php`

9. **GradeLevelCategory.php**
   - Has many `GradeLevel.php`

10. **InventoryOfClassroom.php**
    - Belongs to `School.php`
    - Belongs to `Section.php`

11. **InventoryOfSchoolBuilding.php**
    - Belongs to `School.php`

12. **MakeShift.php**
    - Belongs to `Section.php`

13. **Personnel.php**
    - Belongs to `Position.php`
    - Belongs to `School.php`
    - Belongs to `EmploymentStatus.php`

14. **PersonnelCategory.php**
    - Has many `Personnel.php`

15. **Position.php**
    - Has many `Personnel.php`

16. **Region.php**
    - Has many `Division.php`

17. **RegisteredLearner.php**
    - Belongs to `School.php`
    - Belongs to `Section.php`
    - Belongs to `GradeLevel.php`
    - Belongs to `SchoolYear.php`

18. **School.php**
    - Belongs to `District.php`
    - Has many `RegisteredLearner.php`
    - Has many `Personnel.php`
    - Has many `InventoryOfSchoolBuilding.php`
    - Has many `InventoryOfClassroom.php`

19. **SchoolYear.php**
    - Has many `RegisteredLearner.php`
    - Has many `Attendance.php`

20. **Section.php**
    - Belongs to `School.php`
    - Belongs to `GradeLevel.php`
    - Has many `RegisteredLearner.php`
    - Has many `Attendance.php`

21. **SpecialPrograms.php**
    - Belongs to `School.php`

22. **Strand.php**
    - Belongs to `GradeLevel.php`
    - Has many `Section.php`

23. **TLS.php**
    - Belongs to `School.php`

24. **Track.php**
    - Belongs to `GradeLevel.php`
    - Has many `Section.php`

25. **TransferredIn.php**
    - Belongs to `RegisteredLearner.php`
    - Belongs to `School.php`

26. **TransferredOut.php**
    - Belongs to `RegisteredLearner.php`
    - Belongs to `School.php`

27. **User.php**
    - Belongs to `Personnel.php`

28. **YearLevel.php**
    - Belongs to `GradeLevel.php`
    - Has many `RegisteredLearner.php`


=========================================================================================================
=========================================================================================================
=========================================================================================================
=========================================================================================================
=========================================================================================================


### Enrollment and Attendance Statistics
1. **Registered Learners**
   - Total number of registered learners: 5,000 students.
   - Enrollment trends across different school years:
     - 2023: 1,200 students
     - 2024: 1,350 students
     - 2025: 1,450 students
   - Enrollment distribution by grade levels and categories:
     - Grade 7: 1,000 students
     - Grade 8: 1,200 students
     - Grade 9: 1,300 students
     - Senior High School: 1,500 students
   - Attendance rates and trends for registered learners:
     - Average daily attendance rate: 92%
     - Attendance trend by semester:
       - Semester 1: 93%
       - Semester 2: 91%

2. **Attendance**
   - Overall attendance rate for each school year:
     - 2023: 93%
     - 2024: 92%
     - 2025: 91%
   - Attendance trends by section or grade level:
     - Grade 7: 94%
     - Grade 8: 92%
     - Grade 9: 90%
     - Senior High School: 89%
   - Average daily attendance compared to registered learners: 92%

3. **Dropped Out**
   - Dropout rates by school year:
     - 2023: 3.5%
     - 2024: 3.0%
     - 2025: 3.2%
   - Reasons for dropout categorized by school year or other factors:
     - Financial reasons: 60%
     - Family relocation: 20%
     - Academic reasons: 15%
     - Other: 5%

4. **Transfers**
   - Transfer rates (both in and out) for registered learners:
     - Transfer in: 2.5%
     - Transfer out: 2.7%
   - Analysis of reasons for transfers (in and out):
     - Transfer in reasons: 50% relocation, 30% program preference, 20% academic reasons
     - Transfer out reasons: 40% relocation, 30% program change, 20% academic performance

### Personnel Management
5. **Personnel**
   - Total number of personnel (teachers, staff): 300 employees.
   - Distribution of personnel by position and categories:
     - Teachers: 250
     - Administrative staff: 50
   - Employment status distribution (full-time, part-time, etc.):
     - Full-time: 80%
     - Part-time: 20%

6. **Employment Status**
   - Distribution of employment status among personnel:
     - Permanent: 70%
     - Contractual: 30%
   - Trends in employment status changes over time: Stable with slight increase in contractual roles.

7. **Positions**
   - Number of positions available and filled:
     - Available positions: 350
     - Filled positions: 300
   - Distribution of positions across different schools or divisions: Balanced across divisions with more in urban areas.

### Infrastructure and Facilities
8. **Schools**
   - Total number of schools in each district or division:
     - District A: 20 schools
     - District B: 15 schools
   - Distribution of schools by size (based on facilities like classrooms and buildings):
     - Small schools (<300 students): 10
     - Medium schools (300-600 students): 15
     - Large schools (>600 students): 10

9. **Inventory of School Buildings and Classrooms**
   - Assessment of classroom utilization and availability:
     - Average classroom utilization rate: 85%
     - Maintenance and repair statistics for school buildings: 80% buildings in good condition.

10. **Extension Schools**
    - Utilization rates and impact on main schools:
      - Extension school utilization: 60% capacity.
      - Positive impact on reducing overcrowding in main schools.

### Financial Management
11. **Funding Sources**
    - Analysis of funding sources for schools:
      - Government funding: 70%
      - Private donations: 20%
      - Grants: 10%
    - Allocation and utilization of funds across different schools:
      - Maintenance: 40%
      - Academic programs: 30%
      - Infrastructure: 20%
      - Miscellaneous: 10%

### Academic Programs and Curriculum
12. **Grade Levels, Categories, Strands, and Tracks**
    - Distribution of students across different grade levels, categories, strands, and tracks:
      - Grade 7-9: 3,500 students
      - Senior High School:
        - Academic track: 1,200 students
        - Technical-Vocational-Livelihood track: 800 students
    - Performance metrics for different academic programs: Average pass rate of 85%.

13. **Special Programs and TLS**
    - Participation rates in special programs and TLS:
      - Special programs: 30% of students participate.
      - TLS programs: 20% of Senior High School students.

### Geographic and Administrative Distribution
14. **Regions, Divisions, and Districts**
    - Number of schools and students per region, division, and district:
      - Region A: 50 schools, 10,000 students
      - Division X: 30 schools, 6,000 students
    - Analysis of educational outcomes based on geographic regions:
      - Region A: Higher average test scores compared to national average.

### User Management
15. **Users**
    - Distribution of users (administrators, teachers, etc.) across the system:
      - Administrators: 20
      - Teachers: 250
      - Support staff: 30
    - User activity logs and access patterns: Regular logins during weekdays, peak during morning hours.

### Other Metrics
16. **Year Levels**
    - Distribution of students across different year levels:
      - Year 1: 1,200 students
      - Year 2: 1,100 students
      - Year 3: 1,000 students
    - Performance metrics and trends by year level: Gradual improvement in test scores over years.

These examples demonstrate how data from the outlined relationships between models can be used to derive 
meaningful statistics and insights for effective school management and decision-making.
