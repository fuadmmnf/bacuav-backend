<?php

namespace App\Containers\AppSection\ElectionCandidate\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ElectionCandidate\Data\Repositories\ElectionCandidateRepository;
use App\Ship\Criterias\ThisEqualThatCriteria;
use App\Ship\Criterias\WithRelationCountCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidatesTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($election_id, $include_votes_count = false): mixed
    {
        $this->repository->pushCriteria(new ThisEqualThatCriteria('election_id', $election_id));
        if($include_votes_count){
            $this->repository->pushCriteria(new WithRelationCountCriteria(['votes']));
        }
        return $this->addRequestCriteria()->repository->paginate();
    }
}
