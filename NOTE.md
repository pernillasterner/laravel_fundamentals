

### BelongsToMany Relations

```php
// 1. Find tag with id 3 and store it in a variable
> $tag = App\Models\Tag::find(3)
= App\Models\Tag {#5969
    id: 3,
    name: "programmer",
    created_at: null,
    updated_at: null,
  }


// 2. Get collection of job listings with tag_id: 3
$tag->jobs;
= Illuminate\Database\Eloquent\Collection {#5230
    all: [
      App\Models\Job {#5226
        id: 11,
        employer_id: 11,
        title: "Anthropology Teacher",
        salary: "$50,000",
        created_at: "2024-11-27 14:12:46",
        updated_at: "2024-11-27 14:12:46",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#5227
          tag_id: 3,
          job_listing_id: 11,
        },
      },
    ],
  }

// 3. Make a new BelongsToMany relation using the attach method to job_listing_id: 11
$tag->jobs()->attach(5)


// 4. Get collection of all the job listings and save them into a variable
> $tag->jobs()->get();

= Illuminate\Database\Eloquent\Collection {#6205
    all: [
      App\Models\Job {#6207
        id: 11,
        employer_id: 11,
        title: "Anthropology Teacher",
        salary: "$50,000",
        created_at: "2024-11-27 14:12:46",
        updated_at: "2024-11-27 14:12:46",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#6197
          tag_id: 3,
          job_listing_id: 11,
        },
      },
      App\Models\Job {#6212
        id: 5,
        employer_id: 5,
        title: "Actor",
        salary: "$50,000",
        created_at: "2024-11-27 13:49:40",
        updated_at: "2024-11-27 13:49:40",
> 

// Get a collection of all jobs with the tag_id 3
> $tag->jobs()->get()->pluck('title')
= Illuminate\Support\Collection {#5225
    all: [
      "Anthropology Teacher",
      "Actor",
      "Coroner",
      "Coroner",
    ],
  }

>