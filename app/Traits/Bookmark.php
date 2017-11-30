<?php namespace App\Traits;

/**
 * Bookmarkable Traits
 *
 * -insurance,
 * -agent,
 * -doctor,
 * -facility,
 * -condition,
 * -medication,
 * -tests
 *
 */
trait Bookmark
{
    public function bookmarkItem()
    {
        $bookmarked = auth()->user()->bookmarks()->create([
            'bookmarkable_id' => $this->id,
            'bookmarkable_type' => get_class($this),
        ]);
        return $bookmarked;
    }

    public function unbookmarkItem()
    {
        $item = auth()->user()->bookmarks()->find($this->id);
        $item->delete();
        return $item;
    }

    public function getBookmarkNameAttribute()
    {
        return class_basename($this) == 'Medication' ? $this->attributes['generic_name'] : $this->full_name;
    }
}
