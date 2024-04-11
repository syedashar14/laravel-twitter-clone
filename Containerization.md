Issues faced during containerizing the application:

- DB Host should be the db container service name
- Ports should be correctly mapped.
- I developed a cahe feature in my app which chaces the top 5 users, during the build process of docker image
docker was trying to query that part as it might not have found in the cache. As db was not setup during build so the build process
was being failed. (Need to check why it was this behavior and how to solve it)


Questions:
how .env should be managed in containerized environment? the env variables being used in the docker-compose how they need to be managed
as the .env is not pushed in to the git.

Explore how to make the volumes/storage consistent so that our app data do not get lost when the container is destroyed
