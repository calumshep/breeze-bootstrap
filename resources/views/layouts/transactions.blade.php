<div class="card mb-3">
    <div class="card-body">
        <h3 class="card-title">Transaction History</h3>
        <table class="table table-hover table-striped card-text">
            <thead class="table-light">
            <tr>
                <th>Timestamp</th>
                <th>Net</th>
                <th>By</th>
            </tr>
            </thead>

            <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at->format('H:i d/m/Y') }}</td>
                    <td>
                        {{ ($transaction->net > 0) ? '+' : null }}{{ $transaction->net }} training day(s)
                    </td>
                    <td>{{ $transaction->admin->first_name . ' ' . $transaction->admin->last_name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No transactions found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $transactions->links() }}
    </div>
</div>
