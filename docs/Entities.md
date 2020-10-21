# ENTITIES:
   - [User](./Entities.md/##User)
   - [Team](./Entities.md/###Team)
   - Idea
   - Project
   - ProjectIdea
   - ProjectProduct
   - ProjectAttachment
   - ProjectMember
   - ProjectPart
   - Part
   
   
##User
User is a Kitch client who can 
- @create a project +
- @invite to a project +
- @remove from a project
- @edit project information +
- @attach files to a project with descriptions
- @create a team +
- @invite to a team +
- @remove from a team
- @create an idea +
- @use an idea
- @demonstrate a product
- @plan a product of a project +
- @add parts to the plan
- @see others' projects +
- @buy any needed parts in others' projects
- @use an idea of others' projects
- @join a team +
- @join a project +

### Fields : 
    - id 
    - username
    - first_name
    - last_name
    - phone
    - email
    - password
    
### Relations :
    - teams
    - projects
    - ideas
    - parts
 
   
##Team
Team is an entity that can be users organization with some determined standards, they are following
##Idea
Concept of the project or it's part that can be used by other users to create own project.



