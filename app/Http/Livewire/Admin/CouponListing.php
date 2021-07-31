<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class CouponListing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $couponIds = [];

    protected $listeners = [
        'deleteAll' => 'deleteAll'
    ];

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function toggleCoupon($id)
    {
        if (in_array($id, $this->couponIds)) {
            unset($this->couponIds[array_search($id, $this->couponIds)]);
            $this->couponIds = array_values($this->couponIds);
            return;
        }
        $this->couponIds[] = $id;
    }

    public function deleteAll()
    {
        Coupon::destroy($this->couponIds);
    }

    public function status(Coupon $coupon)
    {
        $coupon->update([
            'status' => !$coupon->status
        ]);
    }

    protected function filter()
    {
        $coupon = Coupon::query();
        if ($this->search) {
            $coupon = $coupon
                ->where('code', 'like', "%{$this->search}%");
        }
        return $coupon
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.admin.coupon-listing')->with(['coupons' => $this->filter()]);
    }
}
