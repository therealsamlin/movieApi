# movieApi

Replace s3 credential in config\filesystems.php 
Replace DB connection string in database.php 

All credentials above can be changed to using env(config_variable)

Call to api/access_token to get access token once has been setup in oauth_clients

Youtube link for walk through video - https://www.youtube.com/watch?v=YWpEi4bTmE8
<a href="http://www.youtube.com/watch?feature=player_embedded&v=YWpEi4bTmE8
" target="_blank"><img src="http://img.youtube.com/vi/YWpEi4bTmE8/0.jpg" 
alt="Movie API Walk Through Video" width="240" height="180" border="10" /></a>

### H4 GET movies/:id

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


### H4 POST movies/

```json
{
  "data": 51
}
```

### H4 GET actors/:id

```json
{
  "data": {
    "name": "Dr. Karianne Durgan",
    "birth_date": "1979-11-09",
    "age": 36,
    "bio": "Iste provident qui soluta ut. Ad consequatur harum deserunt debitis. Commodi dolorem consequatur aspernatur et harum molestiae fugit.",
    "image": "http://lorempixel.com/640/480/?32093"
  }
}
```
