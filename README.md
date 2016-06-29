# movieApi

Replace s3 credential in config\filesystems.php 
Replace DB connection string in database.php 

All credentials above can be changed to using env(config_variable)


Call to api/access_token to get access token once has been setup in oauth_clients


### H3 GET movies/:id

```json
{
  "data": {
    "name": "Esse officia facere nisi eum et vel deserunt dolor dolore magni laboriosam.",
    "rating": "85.00",
    "description": "Voluptatem minus eius enim quidem. Laborum eaque animi quod eum qui et voluptatibus. Sunt sunt molestias architecto molestiae optio. Consequuntur velit quas itaque ex debitis dolores.",
    "image": "http://lorempixel.com/640/480/?61427"
  }
}
```
